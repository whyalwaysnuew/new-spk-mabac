<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Penilaian extends Seeder
{
    public function run()
    {
        $data = [
            // Inserted data
            ['id' => 103, 'id_alternatif' => 16, 'id_kriteria' => 24, 'nilai' => 85],
            ['id' => 104, 'id_alternatif' => 16, 'id_kriteria' => 25, 'nilai' => 88],
            ['id' => 105, 'id_alternatif' => 16, 'id_kriteria' => 26, 'nilai' => 93],
            ['id' => 106, 'id_alternatif' => 16, 'id_kriteria' => 27, 'nilai' => 97],
            ['id' => 107, 'id_alternatif' => 16, 'id_kriteria' => 28, 'nilai' => 100],
            ['id' => 108, 'id_alternatif' => 17, 'id_kriteria' => 24, 'nilai' => 86],
            ['id' => 109, 'id_alternatif' => 17, 'id_kriteria' => 25, 'nilai' => 89],
            ['id' => 110, 'id_alternatif' => 17, 'id_kriteria' => 26, 'nilai' => 92],
            ['id' => 111, 'id_alternatif' => 17, 'id_kriteria' => 27, 'nilai' => 98],
            ['id' => 112, 'id_alternatif' => 17, 'id_kriteria' => 28, 'nilai' => 102],
            ['id' => 113, 'id_alternatif' => 18, 'id_kriteria' => 24, 'nilai' => 85],
            ['id' => 114, 'id_alternatif' => 18, 'id_kriteria' => 25, 'nilai' => 90],
            ['id' => 115, 'id_alternatif' => 18, 'id_kriteria' => 26, 'nilai' => 93],
            ['id' => 116, 'id_alternatif' => 18, 'id_kriteria' => 27, 'nilai' => 99],
            ['id' => 117, 'id_alternatif' => 18, 'id_kriteria' => 28, 'nilai' => 101],
            ['id' => 118, 'id_alternatif' => 19, 'id_kriteria' => 24, 'nilai' => 84],
            ['id' => 119, 'id_alternatif' => 19, 'id_kriteria' => 25, 'nilai' => 88],
            ['id' => 120, 'id_alternatif' => 19, 'id_kriteria' => 26, 'nilai' => 92],
            ['id' => 121, 'id_alternatif' => 19, 'id_kriteria' => 27, 'nilai' => 97],
            ['id' => 122, 'id_alternatif' => 19, 'id_kriteria' => 28, 'nilai' => 100],
            ['id' => 123, 'id_alternatif' => 20, 'id_kriteria' => 24, 'nilai' => 85],
            ['id' => 124, 'id_alternatif' => 20, 'id_kriteria' => 25, 'nilai' => 87],
            ['id' => 125, 'id_alternatif' => 20, 'id_kriteria' => 26, 'nilai' => 93],
            ['id' => 126, 'id_alternatif' => 20, 'id_kriteria' => 27, 'nilai' => 98],
            ['id' => 127, 'id_alternatif' => 20, 'id_kriteria' => 28, 'nilai' => 103],
            // Add more rows as needed
        ];

        $this->db->table('penilaian')->insertBatch($data);
        
    }
}
