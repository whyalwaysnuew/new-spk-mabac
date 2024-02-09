<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserLevel extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'user_level' => 'Administrator',
            ],
            [
                'id' => 2,
                'user_level' => 'User',
            ],
            // Add more rows as needed
        ];

        $this->db->table('user_level')->insertBatch($data);
    }
}
