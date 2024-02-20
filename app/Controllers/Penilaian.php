<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\Penilaian as PenilaianModel;

class Penilaian extends BaseController
{
    public function __construct()
    {
        // parent::__construct();
        $this->penilaian = new PenilaianModel();
    }

    public function index()
    {
        $data = [
            'title' => "Penilaian",
            'ajax' => 'penilaian',
            'menu' => 'penilaian',
            'kriteria'=> $this->penilaian->get_kriteria(),
            'alternatif'=> $this->penilaian->get_alternatif(),  
            'penilaian_model' => $this->penilaian
        ];

        return view('penilaian/index', $data);
    }

    public function modalEdit()
    {
        $id = $this->request->getGet('id');

        $data = [
            'penilaian_model' => $this->penilaian,
            'kriteria'=> $this->penilaian->get_kriteria(),
            'id' => $id
        ];

        return view('penilaian/edit_modal', $data);
    }

    public function modalInput()
    {
        $id = $this->request->getGet('id');

        $data = [
            'penilaian_model' => $this->penilaian,
            'kriteria'=> $this->penilaian->get_kriteria(),
            'id' => $id
        ];

        return view('penilaian/input_modal', $data);
    }

    public function store()
    {
        $id_alternatif = $this->request->getPost('id_alternatif');
        $id_kriteria = $this->request->getPost('id_kriteria');
        $nilai = $this->request->getPost('nilai');

        if(@$id_alternatif && @$id_kriteria && @$nilai){
            $nama_alternatif = $this->penilaian->getNamaAlternatif(@$id_alternatif);
            $i = 0;
            // echo var_dump($nilai);
            foreach ($nilai as $key) {
                $this->penilaian->tambah_penilaian($id_alternatif,$id_kriteria[$i],$key);
                $i++;
            }

            $response = array(
                "response" => 200,
                "message" => "Penilaian untuk " . $nama_alternatif . " Berhasil diinput."
            );
        } else {
            $response = array(
                "response" => 500,
                "message" => "Terjadi kesalahan! Mohon ulangi lagi!."
            );
        }

        echo json_encode($response);
    }

    public function update()
    {
        $id_alternatif = $this->request->getPost('id_alternatif');
        $id_kriteria = $this->request->getPost('id_kriteria');
        $nilai = $this->request->getPost('nilai');
        
        if(@$id_alternatif && @$id_kriteria && @$nilai){
            $nama_alternatif = $this->penilaian->getNamaAlternatif(@$id_alternatif);
            $i = 0;
            foreach ($nilai as $key) {
                $cek = $this->penilaian->data_penilaian($id_alternatif,$id_kriteria[$i]);
                if ($cek==0) {
                    $this->penilaian->tambah_penilaian($id_alternatif,$id_kriteria[$i],$key);
                } else {
                    $this->penilaian->edit_penilaian($id_alternatif,$id_kriteria[$i],$key);	
                }
                $i++;
            }

            $response = array(
                "response" => 200,
                "message" => "Penilaian untuk " . $nama_alternatif . " berhasil diperbarui."
            );

        } else {
            $response = array(
                "response" => 500,
                "message" => "Terjadi kesalahan! Mohon ulangi lagi!."
            );
        }

        echo json_encode($response);
    }

    public function getModalUpload()
    {
        return view('penilaian/penilaian_modal');
    }

    public function dump()
    {
        dd($this->request->getPost());
    }

    public function download()
    {
        
    }
}
