<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Alternatif extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => '16',
                'nama' => 'Moon Ga Young'
            ],
            [
                'id' => '17',
                'nama' => 'Han So Hee'
            ],
            [
                'id' => '18',
                'nama' => 'Shin Min Ah'
            ],
            [
                'id' => '19',
                'nama' => 'Shin Hye Sun'
            ],
            [
                'id' => '20',
                'nama' => 'Go Min Si'
            ],
            [
                'id' => '21',
                'nama' => 'Park Bo Young'
            ],
        ];

        $this->db->table('alternatif')->insertBatch($data);
    }
}
