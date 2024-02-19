<?php

namespace App\Models;

use CodeIgniter\Model;

class Perhitungan extends Model
{
    protected $table            = 'perhitungan';
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

    public function get_kriteria()
        {
            $query = $this->db->table('kriteria')->get();
            return $query->getResult();
        }
        public function get_alternatif()
        {
            $query = $this->db->table('alternatif')->get();
            return $query->getResult();
        }
		
		public function data_nilai($id_alternatif,$id_kriteria)
		{
			$query = $this->db->table('penilaian')
                    ->select('*')
                    ->join('sub_kriteria', 'penilaian.nilai = sub_kriteria.id_sub_kriteria')
                    ->where('penilaian.id_alternatif', $id_alternatif)
                    ->where('penilaian.id_kriteria', $id_kriteria)
                    ->get();

                return $query->getRowArray();
		}

		public function get_max_min($id_kriteria)
        {
            $query = $this->db->query("SELECT 
                    MAX(sub_kriteria.nilai) as max, 
                    MIN(sub_kriteria.nilai) as min, 
                    GROUP_CONCAT(sub_kriteria.nilai) as nilai, 
                    kriteria.jenis 
                FROM 
                    penilaian 
                JOIN 
                    sub_kriteria ON penilaian.nilai = sub_kriteria.id_sub_kriteria 
                JOIN 
                    kriteria ON penilaian.id_kriteria = kriteria.id_kriteria 
                WHERE 
                    penilaian.id_kriteria = '$id_kriteria';
            ");

			return $query->getRowArray();
        }
		
		public function get_nilai_v($id_alternatif,$id_kriteria)
		{
			$query = $this->db->query("SELECT * FROM nilai_v WHERE id_alternatif='$id_alternatif' AND id_kriteria='$id_kriteria';");
			return $query->getRowArray();
		}
		
		public function get_nilai_g($id_kriteria)
		{
			$query = $this->db->query("SELECT * FROM nilai_g WHERE id_kriteria='$id_kriteria';");
			return $query->getRowArray();
		}
		
		public function get_t_alt()
		{
			$query = $this->db->query('SELECT COUNT(*) as num_rows FROM alternatif');
            $row = $query->getRow();

            return $row->num_rows;
		}
		
		public function get_hasil()
        {
			$query = $this->db->query("SELECT * FROM hasil ORDER BY nilai DESC;");
            return $query->getResult();
        }
		
		public function get_hasil_alternatif($id_alternatif)
		{
			$query = $this->db->query("SELECT * FROM alternatif WHERE id_alternatif='$id_alternatif';");
			return $query->getRowArray();		
		}
		
		public function insert_nilai_hasil($hasil_akhir = [])
        {
            $result = $this->db->table('hasil')->insert($hasil_akhir);
            return $result;
        }
		
		public function hapus_hasil()
        {
            $query = $this->db->query("TRUNCATE TABLE hasil;");
			return $query;
        }
		
		public function insert_nilai_v($n_v = [])
        {
            $result = $this->db->table('nilai_v')
                        ->insert($n_v);
            return $result;
        }
		
		public function insert_nilai_g($n_g = [])
        {
            $result = $this->db->table('nilai_g')->insert($n_g);
            return $result;
        }
		
		public function hapus_nilai_g()
        {
            $query = $this->db->table("nilai_g")->truncate();
			return $query;
        }

		public function hapus_nilai_v()
        {
            $query = $this->db->table("nilai_v")->truncate();
			return $query;
        }

}
