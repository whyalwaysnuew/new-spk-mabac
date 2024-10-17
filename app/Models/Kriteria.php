<?php

namespace App\Models;

use CodeIgniter\Model;

class Kriteria extends Model
{
    protected $table            = 'kriteria';
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

    public function getData()
    {
        $query = $this->db->table('kriteria')
                ->orderBy('kode_kriteria')
                ->get();

        return $query->getResult();
    }

    public function getDetail($id)
    {
        $query = $this->db->table('kriteria')
                ->where('id_kriteria', $id)
                ->get();

        return $query->getRow();
    }

    public function insertData($data)
    {
        return $this->db->table('kriteria')
                ->insert($data);
    }

    public function updateData($id, $data)
    {
        return $this->db->table('kriteria')
                ->where('id_kriteria', $id)
                ->update($data);
    }

    public function checkKodeKriteria($kodeKriteria)
    {
        $query = $this->db->table('kriteria')
                ->where('kode_kriteria', $kodeKriteria)
                ->get();

        return $query->getRow();
    }

    public function deleteData($id)
    {
        $query = $this->db->table('kriteria')
                ->where('id_kriteria', $id)
                ->delete();
    }
}
