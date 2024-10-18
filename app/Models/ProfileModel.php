<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    
    public function getDetail($id)
    {
        $query = $this->db->table($this->table)->where('id_user', $id)->get();

        return $query->getRow();
    }

    public function updateData($id, $data)
    {
        return $this->db->table('user')->where('id_user', $id)->update($data);
    }
}
