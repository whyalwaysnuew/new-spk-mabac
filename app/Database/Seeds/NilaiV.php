<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NilaiV extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'id_alternatif' => '16',
                'id_kriteria' => '24',
                'nilai' => '0.315'
            ],
            [
                'id' => '2',
                'id_alternatif' => '16',
                'id_kriteria' => '25',
                'nilai' => '0.4'
            ],
            [
                'id' => '3',
                'id_alternatif' => '16',
                'id_kriteria' => '26',
                'nilai' => '0.36'
            ],
            [
                'id' => '4',
                'id_alternatif' => '16',
                'id_kriteria' => '27',
                'nilai' => '0.2'
            ],
            [
                'id' => '5',
                'id_alternatif' => '16',
                'id_kriteria' => '28',
                'nilai' => '0.21'
            ],
            [
                'id' => '6',
                'id_alternatif' => '17',
                'id_kriteria' => '24',
                'nilai' => '0.42'
            ],
            [
                'id' => '7',
                'id_alternatif' => '17',
                'id_kriteria' => '25',
                'nilai' => '0.4'
            ],
            [
                'id' => '8',
                'id_alternatif' => '17',
                'id_kriteria' => '26',
                'nilai' => '0.18'
            ],
            [
                'id' => '9',
                'id_alternatif' => '17',
                'id_kriteria' => '27',
                'nilai' => '0.4'
            ],
            [
                'id' => '11',
                'id_alternatif' => '18',
                'id_kriteria' => '24',
                'nilai' => '0.315'
            ],
            [
                'id' => '16',
                'id_alternatif' => '19',
                'id_kriteria' => '24',
                'nilai' => '0.21'
            ],
            [
                'id' => '21',
                'id_alternatif' => '20',
                'id_kriteria' => '24',
                'nilai' => '0.315'
            ],
        ];

        $this->db->table('nilai_v')->insertBatch($data);
    }
}
