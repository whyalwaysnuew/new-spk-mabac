<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'user';
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
        $query = $this->db->table('user')
                ->select('user.id_user, user.nama, user.email, user.username, user_level.user_level')
                ->join('user_level', 'user_level.id_user_level = user.id_user_level')
                ->get();
    
        return $query->getResult();
    }

    public function getDetail($id)
    {
        $query = $this->db->table('user')
                ->select('user.id_user, user.nama, user.email, user.username, user.id_user_level')
                ->where('id_user', $id)
                ->get();

        return $query->getRow();
    }

    public function getLevels()
    {
        $query = $this->db->table('user_level')->get();

        return $query->getResult();
    }

    public function insertData($data)
    {
        return $this->db->table('user')->insert($data);
    }

    public function updateData($id, $data)
    {
        return $this->db->table('user')->where('id_user', $id)->update($data);
    }

    public function deleteData($id)
    {
        $query = $this->db->table('user')
                ->where('id_user', $id)
                ->delete();
    }
}
