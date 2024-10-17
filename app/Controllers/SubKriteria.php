<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use App\Models\Subkriteria as Subkriteria_model;

class Subkriteria extends BaseController
{
    public function __construct()
    {
        // parent::__construct();
        $this->subkriteria = new Subkriteria_model();
    }

    public function index()
    {
        $data = [
            'title' => 'Sub Kriteria | SPK MABAC',
            'ajax' => 'sub-kriteria',
            'menu' => 'sub kriteria',
            'subkriteria' => $this->subkriteria->getData(),
            'kriteria' => $this->subkriteria->getDataKriteria(),
        ];

        return view('sub-kriteria/index', $data);
    }

    public function getModalEdit($id)
    {
        $data = [
            'subkriteria' => $this->subkriteria->getDetail($id)
        ];

        return view('sub-kriteria/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $deskripsi = $this->request->getPost('deskripsi');
        $nilai = $this->request->getPost('nilai');
        
            if(@$nilai){
                if(@$deskripsi){
                    $data = [
                        'deskripsi' => $deskripsi,
                        'nilai' => $nilai,
                    ];
        
                    $result = $this->subkriteria->updateData($id, $data);

                    if(@$result)
                    {
                        $response = array(
                            "response" => 200,
                            "message" => $deskripsi . " berhasil diupdate."
                        );
                    } else {
                        $response = array(
                            "response" => 404,
                            "message" => "Terjadi kesalahan! " . $deskripsi . " gagal diupdate."
                        );
                    }
                } else {
                    $response = array(
                        "response" => 504,
                        "message" => "Deskripsi tidak boleh kosong!."
                    );
                }
            } else {
                $response = array(
                    "response" => 503,
                    "message" => "Nilai tidak boleh kosong!."
                );
            }

        echo json_encode($response);
    }

    public function delete()
    {
        $id = $this->request->getGet('id');

        if (@$id) {

            $this->subkriteria->deleteData($id);

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
        $data = [
            'id_kriteria' => $this->request->getGet('id_kriteria')
        ];

        return view('sub-kriteria/subkriteria_modal', $data);
    }

    public function upload()
    {
        $uploadDir = 'uploads/';

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $file = $this->request->getFile('file');
        $id_kriteria = $this->request->getPost('id_kriteria');


        if ($file->isValid()) {
            $originalName = $file->getClientName();
            $filePath = $uploadDir . $originalName;
            $file->move($uploadDir, $originalName);

            // Read the Excel file
            $spreadsheet = $this->readExcelFile($filePath);

            // Process and read the values from each cell
            $values = $this->processExcelData($spreadsheet);

            // Insert values into the database
            $this->insertIntoDatabase($values, $id_kriteria);

            if(file_exists($filePath))
            {
                unlink($filePath);
            }

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'File uploaded successfully.',
                // 'data' => $values,
                // 'id_kriteria' => $id_kriteria
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

    private function insertIntoDatabase($values, $id_kriteria)
    {
        
        foreach ($values as $row) {
            
                $data = [
                    'id_kriteria' => $id_kriteria,
                    'deskripsi' => $row[0], // Adjust index based on your Excel column order
                    'nilai' => $row[1]
                    // Add more columns as needed
                ];
    
                $this->subkriteria->insertData($data, $id_kriteria);
        }
    }
}
