<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kriteria extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => '24',
                'keterangan' => 'Pendidikan',
                'kode_kriteria' => 'C1',
                'bobot' => '0.21',
                'jenis' => 'Benefit'
            ],
            [
                'id' => '25',
                'keterangan' => 'Umur',
                'kode_kriteria' => 'C2',
                'bobot' => '0.2',
                'jenis' => 'Benefit'
            ],
            [
                'id' => '26',
                'keterangan' => 'Kesehatan',
                'kode_kriteria' => 'C3',
                'bobot' => '0.18',
                'jenis' => 'Benefit'
            ],
            [
                'id' => '27',
                'keterangan' => 'Keahlian',
                'kode_kriteria' => 'C4',
                'bobot' => '0.2',
                'jenis' => 'Benefit'
            ],
            [
                'id' => '28',
                'keterangan' => 'Pengalaman Kerja',
                'kode_kriteria' => 'C5',
                'bobot' => '0.21',
                'jenis' => 'Benefit'
            ],
        ];

        $this->db->table('kriteria')->insertBatch($data);
    }
}
