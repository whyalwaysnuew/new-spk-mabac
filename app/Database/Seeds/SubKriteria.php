<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SubKriteria extends Seeder
{
    public function run()
    {
        $data = [
            // Inserted data
            ['id' => 84, 'id_kriteria' => 24, 'deskripsi' => 'D3', 'nilai' => 2],
            ['id' => 85, 'id_kriteria' => 24, 'deskripsi' => 'S1', 'nilai' => 3],
            ['id' => 86, 'id_kriteria' => 24, 'deskripsi' => 'S2', 'nilai' => 4],
            ['id' => 87, 'id_kriteria' => 25, 'deskripsi' => '29 Tahun', 'nilai' => 4],
            ['id' => 88, 'id_kriteria' => 25, 'deskripsi' => '24 Tahun', 'nilai' => 5],
            ['id' => 89, 'id_kriteria' => 25, 'deskripsi' => '28 Tahun', 'nilai' => 5],
            ['id' => 90, 'id_kriteria' => 25, 'deskripsi' => '26 Tahun', 'nilai' => 5],
            ['id' => 92, 'id_kriteria' => 26, 'deskripsi' => 'Cukup', 'nilai' => 3],
            ['id' => 93, 'id_kriteria' => 26, 'deskripsi' => 'Baik', 'nilai' => 4],
            ['id' => 94, 'id_kriteria' => 26, 'deskripsi' => 'Sangat Baik', 'nilai' => 5],
            ['id' => 95, 'id_kriteria' => 26, 'deskripsi' => 'Kurang', 'nilai' => 2],
            ['id' => 96, 'id_kriteria' => 26, 'deskripsi' => 'Sangat Kurang', 'nilai' => 1],
            ['id' => 97, 'id_kriteria' => 27, 'deskripsi' => '70', 'nilai' => 3],
            ['id' => 98, 'id_kriteria' => 27, 'deskripsi' => '80', 'nilai' => 4],
            ['id' => 99, 'id_kriteria' => 27, 'deskripsi' => '85', 'nilai' => 4],
            ['id' => 100, 'id_kriteria' => 28, 'deskripsi' => '1 tahun', 'nilai' => 1],
            ['id' => 101, 'id_kriteria' => 28, 'deskripsi' => '2 Tahun', 'nilai' => 1],
            ['id' => 102, 'id_kriteria' => 28, 'deskripsi' => '3 Tahun', 'nilai' => 2],
            ['id' => 103, 'id_kriteria' => 28, 'deskripsi' => '4 Tahun', 'nilai' => 2],
            // Add more rows as needed
        ];

        $this->db->table('sub_kriteria')->insertBatch($data);
    }
}
