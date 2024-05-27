<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisTransaksi extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'    => 'pendaftaran',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'    => 'pendaftaran ulang',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'    => 'bulanan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Using Query Builder
        $this->db->table('jenis_transaksi')->insertBatch($data);
    }
}
