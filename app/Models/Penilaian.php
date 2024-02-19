<?php

namespace App\Models;

use CodeIgniter\Model;

class Penilaian extends Model
{
    protected $table            = 'penilaian';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function tambah_penilaian($id_alternatif, $id_kriteria, $nilai)
    {
        $data = [
            'id_alternatif' => $id_alternatif,
            'id_kriteria'   => $id_kriteria,
            'nilai'         => $nilai
        ];

        $query = $this->db->table('penilaian')->insert($data);

        return $query;
    }

    
    public function edit_penilaian($id_alternatif, $id_kriteria, $nilai)
    {
        $data = [
            'nilai' => $nilai
        ];

        $query = $this->db->table('penilaian')
                        ->where('id_alternatif', $id_alternatif)
                        ->where('id_kriteria', $id_kriteria)
                        ->update($data);

        return $query;
    }

    
    public function get_kriteria()
    {
        $query = $this->db->table('kriteria')->get();
        return $query->getResult();
    }

    public function get_alternatif()
    {
        $query = $this->db->table("alternatif")->get();
        return $query->getResult();
    }        

    public function data_penilaian($id_alternatif, $id_kriteria)
    {
        $query = $this->db->table('penilaian')
                        ->where('id_alternatif', $id_alternatif)
                        ->where('id_kriteria', $id_kriteria)
                        ->get();

        return $query->getRowArray();
    }


    public function untuk_tombol($id_alternatif)
    {
        $query = $this->db->table('penilaian')
                        ->where('id_alternatif', $id_alternatif)
                        ->get();

        return count($query->getResult());
    }


    public function data_sub_kriteria($id_kriteria)
    {
        $query = $this->db->table('sub_kriteria')
                        ->where('id_kriteria', $id_kriteria)
                        ->orderBy('nilai', 'DESC')
                        ->get();

        return $query->getResultArray();
    }

    public function getNamaAlternatif($id_alternatif)
    {
        $query = $this->db->table('alternatif')
                ->select('nama')
                ->where('id_alternatif', $id_alternatif)
                ->get();
        return $query->getRow()->nama;
    }
}
