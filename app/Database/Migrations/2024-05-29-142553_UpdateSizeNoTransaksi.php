<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateSizeNoTransaksi extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('transaksi', [
            'no_transaksi' => [
                'type'       => 'VARCHAR',
                'constraint' => 11,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('transaksi', [
            'no_transaksi' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
            ],
        ]);
    }
}
