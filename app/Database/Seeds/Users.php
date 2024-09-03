<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'    => 'super admin',
                'username'   => 'super_admin@gmail.com',
                'password'   => password_hash('password', PASSWORD_BCRYPT),
                'role'   => 'super_admin',
                // 'image' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'    => 'admin keuangan',
                'username'   => 'admin_keuangan@gmail.com',
                'password'   => password_hash('password', PASSWORD_BCRYPT),
                'role'   => 'admin_keuangan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'    => 'admin santri',
                'username'   => 'admin_santri@gmail.com',
                'password'   => password_hash('password', PASSWORD_BCRYPT),
                'role'   => 'admin_santri',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
}
