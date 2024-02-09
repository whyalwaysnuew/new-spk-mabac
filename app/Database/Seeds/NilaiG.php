<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NilaiG extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'id_kriteria' => '24',
                'nilai' => '0.307666'
            ],
            [
                'id' => '2',
                'id_kriteria' => '25',
                'nilai' => '0.34822'
            ],
            [
                'id' => '3',
                'id_kriteria' => '26',
                'nilai' => '0.272829'
            ],
            [
                'id' => '4',
                'id_kriteria' => '27',
                'nilai' => '0.303143'
            ],
            [
                'id' => '5',
                'id_kriteria' => '28',
                'nilai' => '0.277097'
            ],
        ];

        $this->db->table('nilai_g')->insertBatch($data);
    }
}
