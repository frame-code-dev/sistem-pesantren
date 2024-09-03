<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeFieldsToTransaksiTable extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('transaksi', [
            'santri_id' => [
                'name'       => 'santri_id',
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => null,
            ],
            'jenis_id' => [
                'name'       => 'jenis_id',
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => null,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('transaksi', [
            'santri_id' => [
                'name'       => 'santri_id',
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'jenis_id' => [
                'name'       => 'jenis_id',
                'type'       => 'INT',
                'constraint' => 11,
            ],
        ]);
    }
}
