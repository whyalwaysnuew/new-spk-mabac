<?php

namespace App\Models;

use CodeIgniter\Model;

class Alternatif extends Model
{
    protected $table            = 'alternatif';
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

    public function getDataAlternatif()
    {
        $query = $this->db->table('alternatif')->get();

        return $query->getResult();
    }

    public function insertData($data)
    {
        return $this->db->table('alternatif')
                ->insert($data);
    }

    public function deleteData($id)
    {
        $query = $this->db->table('alternatif')
                ->where('id_alternatif', $id)
                ->delete();
    }

    public function hapus_nilai_v()
    {
        return $this->db->table('nilai_v')->truncate();
    }

    public function hapus_penilaian()
    {
        return $this->db->table('penilaian')->truncate();
    }

    public function hapus_hasil()
    {
        return $this->db->table('hasil')->truncate();
    }
}
