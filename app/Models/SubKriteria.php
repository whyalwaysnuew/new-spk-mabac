<?php

namespace App\Models;

use CodeIgniter\Model;

class Subkriteria extends Model
{
    protected $table            = 'sub_kriteria';
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
        $query = $this->db->table('sub_kriteria')->get();

        return $query->getResult();
    }

    public function getDetail($id)
    {
        $query = $this->db->table('sub_kriteria')->where('id_sub_kriteria', $id)->get();

        return $query->getRow();
    }

    public function getDataKriteria()
    {
        $query = $this->db->table('kriteria')->get();

        return $query->getResult();
    }

    public function insertData($data)
    {
        return $this->db->table('sub_kriteria')
                ->insert($data);
    }

    public function updateData($id, $data)
    {
        return $this->db->table('sub_kriteria')
                ->where('id_sub_kriteria', $id)
                ->update($data);
    }

    public function deleteData($id_sub_kriteria)
    {
        $query = $this->db->table('sub_kriteria')
                ->where('id_sub_kriteria', $id_sub_kriteria)
                ->delete();
    }
}
