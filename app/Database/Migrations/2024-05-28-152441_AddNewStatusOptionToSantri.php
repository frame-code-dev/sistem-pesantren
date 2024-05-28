<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNewStatusOptionToSantri extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('santri', [
            'status_santri' => [
                'type'       => 'ENUM',
                'constraint' => ['belum_registrasi', 'belum_registrasi_ulang', 'aktif', 'alumni'],
                'default'    => 'belum_registrasi',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('santri', [
            'status_santri' => [
                'type'       => 'ENUM',
                'constraint' => ['aktif', 'alumni'],
                'default'    => 'aktif',
            ],
        ]);
    }
}
