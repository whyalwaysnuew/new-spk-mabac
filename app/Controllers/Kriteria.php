<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\Kriteria as KriteriaModel;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Kriteria extends BaseController
{

    public function __construct()
    {
        // parent::__construct();
        $this->kriteria = new KriteriaModel();

        
    }

    public function index()
    {
        $data = [
            'title' => 'Kriteria | SPK MABAC',
            'ajax' => 'kriteria',
            'menu' => 'Kriteria',
            'kriteria' => $this->kriteria->getData()
        ];

        return view('kriteria/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kriteria | SPK MABAC',
            'ajax' => 'kriteria',
            'menu' => 'Kriteria',
        ];

        return view('kriteria/create', $data);
    }


    public function delete()
    {
        $id = $this->request->getGet('id');

        if (@$id) {

            $this->kriteria->deleteData($id);

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
        return view('kriteria/kriteria_modal');
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

            if (!empty($rowValues[3]) && !is_numeric($rowValues[3])) {
                // Skip the row if column D is not a float
                continue;
            }

            $values[] = $rowValues;
        }

        return $values;
    }

    private function insertIntoDatabase($values)
    {
        
        foreach ($values as $row) {
            $kodeKriteria = $row[0]; // Assuming kode_kriteria is in the first column (index 0)

            $existingData = $this->kriteria->checkKodeKriteria($kodeKriteria);
            if(!$existingData){
                $data = [
                    'kode_kriteria' => $row[0], // Adjust index based on your Excel column order
                    'keterangan' => $row[1],
                    'jenis' => $row[2],
                    'bobot' => $row[3],
                    // Add more columns as needed
                ];
    
                $this->kriteria->insertData($data);
            }
        }
    }

}
