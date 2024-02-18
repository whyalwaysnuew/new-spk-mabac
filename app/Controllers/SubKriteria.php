<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

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

    public function getModalUpload()
    {
        $data = [
            'id' => $this->request->getGet('id_kriteria')
        ];

        return view('sub-kriteria/subkriteria_modal', $data);
    }

    public function upload()
    {
        $id = $this->request->getGet('id');
        $uploadDir = 'uploads/';

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $file = $this->request->getFile('file');

        if ($file->isValid()) {
            $originalName = $file->getClientName();
            $file->move($uploadDir, $originalName);

            return $this->response->setJSON(['status' => 'success', 'message' => 'File uploaded successfully.' . $id]);
        } else {
            // Remove the uploaded file if there's an error
            // if (file_exists($file->getTempName())) {
            //     unlink($file->getTempName());
            // }

            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid file format. Please upload a valid Excel file.' . $id]);
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
}
