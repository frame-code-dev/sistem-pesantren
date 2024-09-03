<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateTahunBulanTransaksi extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('transaksi', [
            'bulan' => [
                'type'       => 'INT',
                'constraint' => 2,
                'null'       => true,
            ],
        ]);

        // Modify the 'tahun' column to be nullable
        $this->forge->modifyColumn('transaksi', [
            'tahun' => [
                'type'       => 'INT',
                'constraint' => 4,
                'null'       => true,
            ],
        ]);
    }

    public function down()
    {
    }
}
