<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'    => 'super admin',
                'username'   => 'super_admin@gmail.com',
                'password'   => hash('password', 'secret'),
                'role'   => 'super_admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'    => 'admin keuangan',
                'username'   => 'admin_keuangan@gmail.com',
                'password'   => hash('password', 'secret'),
                'role'   => 'super_keuangan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'    => 'admin santri',
                'username'   => 'admin_santri@gmail.com',
                'password'   => hash('password', 'secret'),
                'role'   => 'super_santri',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
}
