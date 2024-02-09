<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Hasil extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'id_alternatif' => '16',
                'nilai' => '-0.023955'
            ],
            [
                'id' => '2',
                'id_alternatif' => '17',
                'nilai' => '0.311045'
            ],
            [
                'id' => '3',
                'id_alternatif' => '18',
                'nilai' => '0.176045'
            ],
            [
                'id' => '4',
                'id_alternatif' => '19',
                'nilai' => '-0.308955'
            ],
            [
                'id' => '5',
                'id_alternatif' => '20',
                'nilai' => '-0.186045'
            ],
        ];

        $this->db->table('hasil')->insertBatch($data);
    }
}
