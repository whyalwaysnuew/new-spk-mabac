<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use App\Models\Alternatif as AlternatifModel;

class Alternatif extends BaseController
{
    public function __construct()
    {
        // parent::__construct();
        $this->alternatif = new AlternatifModel();

        
    }

    public function index()
    {
        $data = [
            'title' => 'Alternatif | SPK Mabac',
            'ajax' => 'alternatif',
            'menu' => 'Alternatif',
            'alternatif' => $this->alternatif->getDataAlternatif()
        ];

        // dd($data);

        return view('alternatif/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Alternatif | SPK Mabac',
            'ajax' => 'alternatif',
            'menu' => 'alternatif'
        ];

        return view('alternatif/create', $data);
    }

    public function store()
    {
        $nama = $this->request->getPost('nama');
        
        if(@$nama){
            $data = [
                'nama' => $nama
            ];

            $result = $this->alternatif->insertData($data);

            if(@$result) {
                $response = array(
                    "response" => 200,
                    "message" => $nama . " berhasil diinput."
                );
            } else {
                $response = array(
                    "response" => 404,
                    "message" => "Terjadi kesalahan! " . $nama . " gagal diinput."
                );
            }

        } else {
            $response = array(
                "response" => 500,
                "message" => "Nama tidak boleh kosong!."
            );
        }

        echo json_encode($response);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        
        if(@$nama){
            $data = [
                'nama' => $nama
            ];

            $result = $this->alternatif->updateData($id, $data);

            if(@$result) {
                $response = array(
                    "response" => 200,
                    "message" => $nama . " berhasil diubah."
                );
            } else {
                $response = array(
                    "response" => 404,
                    "message" => "Terjadi kesalahan! " . $nama . " gagal diubah."
                );
            }

        } else {
            $response = array(
                "response" => 500,
                "message" => "Nama tidak boleh kosong!."
            );
        }

        echo json_encode($response);
    }




    public function delete()
    {
        $id = $this->request->getGet('id');

        if (@$id) {

            $this->alternatif->deleteData($id);

            $response = array(
                "response" => 200,
                "message" => "Data successfully deleted."
            );
        } else {
            $response = array(
                "response" => 500,
                "message" => "An error occured while processing your request."
            );
        }

        echo json_encode($response);
    }

    public function getModalUpload()
    {
        return view('alternatif/alternatif_modal');
    }

    public function getModalCreate()
    {
        return view('alternatif/create_modal');
    }

    public function getModalEdit($id)
    {
        $alternatif = $this->alternatif->getDetail($id);

        $data = [
            'alternatif' => $alternatif
        ];

        return view('alternatif/edit', $data);
    }

    public function upload()
    {
        $uploadDir = 'uploads/';

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $file = $this->request->getFile('file');

        if ($file->isValid()) {
            $originalName = $file->getClientName();
            $filePath = $uploadDir . $originalName;
            $file->move($uploadDir, $originalName);

            // Read the Excel file
            $spreadsheet = $this->readExcelFile($filePath);

            // Process and read the values from each cell
            $values = $this->processExcelData($spreadsheet);

            // Insert values into the database
            $this->insertIntoDatabase($values);

            if(file_exists($filePath))
            {
                unlink($filePath);
            }

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'File uploaded successfully.',
                'data' => $values
            ]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid file format. Please upload a valid Excel file.']);
        }
    }

    public function removeFile()
    {
        $uploadDir = 'uploads/';
        $filename = $this->request->getPost('filename');

        $filepath = $uploadDir . $filename;

        if (file_exists($filepath)) {
            unlink($filepath);
            return $this->response->setJSON(['status' => 'success', 'message' => 'File removed successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'File not found.']);
        }
    }

    private function readExcelFile($filePath)
    {
        $reader = new Xlsx();
        $spreadsheet = $reader->load($filePath);

        return $spreadsheet;
    }

    private function processExcelData($spreadsheet)
    {
        $values = [];

        $worksheet = $spreadsheet->getActiveSheet();
        $headerRowSkipped = false;

        foreach ($worksheet->getRowIterator() as $row) {
            if (!$headerRowSkipped) {
                $headerRowSkipped = true;
                continue; // Skip the header row
            }

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $rowValues = [];
            foreach ($cellIterator as $cell) {
                $rowValues[] = $cell->getValue();
            }

            $values[] = $rowValues;
        }

        return $values;
    }

    private function insertIntoDatabase($values)
    {
        
        foreach ($values as $row) {
            
                $data = [
                    'nama' => $row[0], // Adjust index based on your Excel column order
                    // Add more columns as needed
                ];
    
                $this->alternatif->insertData($data);
        }
    }
}
