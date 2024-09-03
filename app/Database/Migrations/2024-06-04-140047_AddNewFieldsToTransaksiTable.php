<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNewFieldsToTransaksiTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('transaksi', [
            'keterangan' => [
                'type'       => 'text',
                "after" => "tahun",
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('transaksi', 'keterangan');
    }
}
