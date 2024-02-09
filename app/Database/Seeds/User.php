<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'id_user_level' => 1,
                'nama' => 'Admin',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'password' => md5('abcd1234'),
            ],
            [
                'id' => 7,
                'id_user_level' => 2,
                'nama' => 'User',
                'email' => 'user@gmail.com',
                'username' => 'user',
                'password' => md5('abcd12345'),
            ],
            // Add more rows as needed
        ];

        $this->db->table('user')->insertBatch($data);
    }
}
