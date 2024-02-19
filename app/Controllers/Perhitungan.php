<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\Perhitungan as PerhitunganModel;

class Perhitungan extends BaseController
{
    public function __construct()
    {
        // parent::__construct();
        $this->perhitungan = new PerhitunganModel();
    }

    public function index()
    {
        return redirect()->to('/perhitungan/perhitungan-x');
    }

    public function x()
    {
        $this->perhitungan->hapus_nilai_v();
        $kriteria = $this->perhitungan->get_kriteria();
        $alternatif = $this->perhitungan->get_alternatif();
        
        foreach ($alternatif as $keys){
            foreach ($kriteria as $key){
                $data_pencocokan = $this->perhitungan->data_nilai($keys->id_alternatif,$key->id_kriteria);
                $min_max=$this->perhitungan->get_max_min($key->id_kriteria);
                $bobot = $key->bobot;
                if($min_max['jenis']=='Benefit'){
                    $n_r = @(($data_pencocokan['nilai']-$min_max['min'])/($min_max['max']-$min_max['min']));
                }else{
                    $n_r = @(($data_pencocokan['nilai']-$min_max['max'])/($min_max['min']-$min_max['max']));
                }
                $nilai_vk = ($bobot*$n_r)+$bobot;
                
                $n_v = [
                    'id_alternatif' => $keys->id_alternatif,
                    'id_kriteria' => $key->id_kriteria,
                    'nilai' => $nilai_vk
                ];
                $this->perhitungan->insert_nilai_v($n_v);
            }
        }
        
        $this->perhitungan->hapus_nilai_g();
        foreach ($kriteria as $key){
            $n_b = 1;
            foreach ($alternatif as $keys){
                $nilai_b = $this->perhitungan->get_nilai_v($keys->id_alternatif,$key->id_kriteria);
                $n_b *= $nilai_b['nilai'];
            }
            $t_alt = $this->perhitungan->get_t_alt();
            $ng = pow($n_b,1/$t_alt);
            $n_g = [
                'id_kriteria' => $key->id_kriteria,
                'nilai' => $ng
            ];

            $this->perhitungan->insert_nilai_g($n_g);
        }
        


        $data = [
            'title' => 'Perhitungan | SPK MABAC',
            'ajax' => 'perhitungan',
            'menu' => 'perhitungan',
            'kriteria'=> $this->perhitungan->get_kriteria(),
            'alternatif'=> $this->perhitungan->get_alternatif(),
            'perhitungan_model' => $this->perhitungan
        ];

        return view('perhitungan/index', $data);
    }

    public function w()
    {
        $data = [
            'title' => 'Perhitungan | SPK MABAC',
            'ajax' => 'perhitungan',
            'menu' => 'perhitungan',
            'kriteria'=> $this->perhitungan->get_kriteria(),
            'alternatif'=> $this->perhitungan->get_alternatif(),
        ];

        return view('perhitungan/w', $data);
    }

    public function n()
    {
        $this->perhitungan->hapus_nilai_v();
        $kriteria = $this->perhitungan->get_kriteria();
        $alternatif = $this->perhitungan->get_alternatif();
        
        foreach ($alternatif as $keys){
            foreach ($kriteria as $key){
                $data_pencocokan = $this->perhitungan->data_nilai($keys->id_alternatif,$key->id_kriteria);
                $min_max=$this->perhitungan->get_max_min($key->id_kriteria);
                $bobot = $key->bobot;
                if($min_max['jenis']=='Benefit'){
                    $n_r = @(($data_pencocokan['nilai']-$min_max['min'])/($min_max['max']-$min_max['min']));
                }else{
                    $n_r = @(($data_pencocokan['nilai']-$min_max['max'])/($min_max['min']-$min_max['max']));
                }
                $nilai_vk = ($bobot*$n_r)+$bobot;
                
                $n_v = [
                    'id_alternatif' => $keys->id_alternatif,
                    'id_kriteria' => $key->id_kriteria,
                    'nilai' => $nilai_vk
                ];
                $this->perhitungan->insert_nilai_v($n_v);
            }
        }
        
        $this->perhitungan->hapus_nilai_g();
        foreach ($kriteria as $key){
            $n_b = 1;
            foreach ($alternatif as $keys){
                $nilai_b = $this->perhitungan->get_nilai_v($keys->id_alternatif,$key->id_kriteria);
                $n_b *= $nilai_b['nilai'];
            }
            $t_alt = $this->perhitungan->get_t_alt();
            $ng = pow($n_b,1/$t_alt);
            $n_g = [
                'id_kriteria' => $key->id_kriteria,
                'nilai' => $ng
            ];

            $this->perhitungan->insert_nilai_g($n_g);
        }

        $this->perhitungan->hapus_nilai_g();
        $this->perhitungan->hapus_nilai_v();
        $kriteria = $this->perhitungan->get_kriteria();
        $alternatif = $this->perhitungan->get_alternatif();
        
        foreach ($alternatif as $keys){
            foreach ($kriteria as $key){
                $data_pencocokan = $this->perhitungan->data_nilai($keys->id_alternatif,$key->id_kriteria);
                $min_max=$this->perhitungan->get_max_min($key->id_kriteria);
                $bobot = $key->bobot;
                if($min_max['jenis']=='Benefit'){
                    $n_r = @(($data_pencocokan['nilai']-$min_max['min'])/($min_max['max']-$min_max['min']));
                }else{
                    $n_r = @(($data_pencocokan['nilai']-$min_max['max'])/($min_max['min']-$min_max['max']));
                }
                $nilai_vk = ($bobot*$n_r)+$bobot;
                
                $n_v = [
                    'id_alternatif' => $keys->id_alternatif,
                    'id_kriteria' => $key->id_kriteria,
                    'nilai' => $nilai_vk
                ];
                $this->perhitungan->insert_nilai_v($n_v);
            }
        }
        
        foreach ($kriteria as $key) {
            $n_b = 1;

            foreach ($alternatif as $keys) {
                $nilai_b = $this->perhitungan->get_nilai_v($keys->id_alternatif, $key->id_kriteria);

                // Check if $nilai_b['nilai'] is a numeric value before performing multiplication
                if (is_numeric($nilai_b['nilai'])) {
                    $n_b *= $nilai_b['nilai'];
                }
            }

            $t_alt = $this->perhitungan->get_t_alt();

            // Check if $n_b is greater than 0 before calculating the nth root
            if ($n_b > 0) {
                $ng = pow($n_b, 1 / $t_alt);
            } else {
                $ng = 0; // Set a default value or handle the case appropriately
            }

            $n_g = [
                'id_kriteria' => $key->id_kriteria,
                'nilai' => $ng
            ];

            $this->perhitungan->insert_nilai_g($n_g);
        }


        $data = [
            'title' => 'Perhitungan | SPK MABAC',
            'ajax' => 'perhitungan',
            'menu' => 'perhitungan',
            'kriteria'=> $this->perhitungan->get_kriteria(),
            'alternatif'=> $this->perhitungan->get_alternatif(),
            'perhitungan_model' => $this->perhitungan
        ];

        return view('perhitungan/n', $data);
    }

    public function v()
    {
        $this->perhitungan->hapus_nilai_v();
        $kriteria = $this->perhitungan->get_kriteria();
        $alternatif = $this->perhitungan->get_alternatif();
        
        foreach ($alternatif as $keys){
            foreach ($kriteria as $key){
                $data_pencocokan = $this->perhitungan->data_nilai($keys->id_alternatif,$key->id_kriteria);
                $min_max=$this->perhitungan->get_max_min($key->id_kriteria);
                $bobot = $key->bobot;
                if($min_max['jenis']=='Benefit'){
                    $n_r = @(($data_pencocokan['nilai']-$min_max['min'])/($min_max['max']-$min_max['min']));
                }else{
                    $n_r = @(($data_pencocokan['nilai']-$min_max['max'])/($min_max['min']-$min_max['max']));
                }
                $nilai_vk = ($bobot*$n_r)+$bobot;
                
                $n_v = [
                    'id_alternatif' => $keys->id_alternatif,
                    'id_kriteria' => $key->id_kriteria,
                    'nilai' => $nilai_vk
                ];
                $this->perhitungan->insert_nilai_v($n_v);
            }
        }
        
        $this->perhitungan->hapus_nilai_g();
        foreach ($kriteria as $key){
            $n_b = 1;
            foreach ($alternatif as $keys){
                $nilai_b = $this->perhitungan->get_nilai_v($keys->id_alternatif,$key->id_kriteria);
                $n_b *= $nilai_b['nilai'];
            }
            $t_alt = $this->perhitungan->get_t_alt();
            $ng = pow($n_b,1/$t_alt);
            $n_g = [
                'id_kriteria' => $key->id_kriteria,
                'nilai' => $ng
            ];

            $this->perhitungan->insert_nilai_g($n_g);
        }

        $data = [
            'title' => 'Perhitungan | SPK MABAC',
            'ajax' => 'perhitungan',
            'menu' => 'perhitungan',
            'kriteria'=> $this->perhitungan->get_kriteria(),
            'alternatif'=> $this->perhitungan->get_alternatif(),
            'perhitungan_model' => $this->perhitungan
        ];

        return view('perhitungan/v', $data);
    }

    public function g()
    {
        $this->perhitungan->hapus_nilai_v();
        $kriteria = $this->perhitungan->get_kriteria();
        $alternatif = $this->perhitungan->get_alternatif();
        
        foreach ($alternatif as $keys){
            foreach ($kriteria as $key){
                $data_pencocokan = $this->perhitungan->data_nilai($keys->id_alternatif,$key->id_kriteria);
                $min_max=$this->perhitungan->get_max_min($key->id_kriteria);
                $bobot = $key->bobot;
                if($min_max['jenis']=='Benefit'){
                    $n_r = @(($data_pencocokan['nilai']-$min_max['min'])/($min_max['max']-$min_max['min']));
                }else{
                    $n_r = @(($data_pencocokan['nilai']-$min_max['max'])/($min_max['min']-$min_max['max']));
                }
                $nilai_vk = ($bobot*$n_r)+$bobot;
                
                $n_v = [
                    'id_alternatif' => $keys->id_alternatif,
                    'id_kriteria' => $key->id_kriteria,
                    'nilai' => $nilai_vk
                ];
                $this->perhitungan->insert_nilai_v($n_v);
            }
        }
        
        $this->perhitungan->hapus_nilai_g();
        foreach ($kriteria as $key){
            $n_b = 1;
            foreach ($alternatif as $keys){
                $nilai_b = $this->perhitungan->get_nilai_v($keys->id_alternatif,$key->id_kriteria);
                $n_b *= $nilai_b['nilai'];
            }
            $t_alt = $this->perhitungan->get_t_alt();
            $ng = pow($n_b,1/$t_alt);
            $n_g = [
                'id_kriteria' => $key->id_kriteria,
                'nilai' => $ng
            ];

            $this->perhitungan->insert_nilai_g($n_g);
        }

        $data = [
            'title' => 'Perhitungan | SPK MABAC',
            'ajax' => 'perhitungan',
            'menu' => 'perhitungan',
            'kriteria'=> $this->perhitungan->get_kriteria(),
            'perhitungan_model' => $this->perhitungan
        ];

        return view('perhitungan/g', $data);
    }

    public function q()
    {
        $this->perhitungan->hapus_nilai_v();
        $kriteria = $this->perhitungan->get_kriteria();
        $alternatif = $this->perhitungan->get_alternatif();
        
        foreach ($alternatif as $keys){
            foreach ($kriteria as $key){
                $data_pencocokan = $this->perhitungan->data_nilai($keys->id_alternatif,$key->id_kriteria);
                $min_max=$this->perhitungan->get_max_min($key->id_kriteria);
                $bobot = $key->bobot;
                if($min_max['jenis']=='Benefit'){
                    $n_r = @(($data_pencocokan['nilai']-$min_max['min'])/($min_max['max']-$min_max['min']));
                }else{
                    $n_r = @(($data_pencocokan['nilai']-$min_max['max'])/($min_max['min']-$min_max['max']));
                }
                $nilai_vk = ($bobot*$n_r)+$bobot;
                
                $n_v = [
                    'id_alternatif' => $keys->id_alternatif,
                    'id_kriteria' => $key->id_kriteria,
                    'nilai' => $nilai_vk
                ];
                $this->perhitungan->insert_nilai_v($n_v);
            }
        }
        
        $this->perhitungan->hapus_nilai_g();
        foreach ($kriteria as $key){
            $n_b = 1;
            foreach ($alternatif as $keys){
                $nilai_b = $this->perhitungan->get_nilai_v($keys->id_alternatif,$key->id_kriteria);
                $n_b *= $nilai_b['nilai'];
            }
            $t_alt = $this->perhitungan->get_t_alt();
            $ng = pow($n_b,1/$t_alt);
            $n_g = [
                'id_kriteria' => $key->id_kriteria,
                'nilai' => $ng
            ];

            $this->perhitungan->insert_nilai_g($n_g);
        }

        $data = [
            'title' => 'Perhitungan | SPK MABAC',
            'ajax' => 'perhitungan',
            'menu' => 'perhitungan',
            'kriteria'=> $this->perhitungan->get_kriteria(),
            'alternatif'=> $this->perhitungan->get_alternatif(),
            'perhitungan_model' => $this->perhitungan
        ];

        return view('perhitungan/q', $data);
    }

    public function hasil()
    {
         $data = [
                'title' => "Hasil | SPK MABAC",
				'hasil'=> $this->perhitungan->get_hasil(),
                'perhitungan_model' => $this->perhitungan
            ];
			
            return view('perhitungan/hasil', $data);
    }
}
