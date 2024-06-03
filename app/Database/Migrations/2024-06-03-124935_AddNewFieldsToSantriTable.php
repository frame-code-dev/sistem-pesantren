<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNewFieldsToSantriTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('santri', [
            'nisn' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
                'null'       => true,
                'after'      => 'gender', // Menambahkan setelah kolom gender
            ],
            'nik_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => '16',
                'null'       => true,
                'after'      => 'nisn',
            ],
            'no_kk' => [
                'type'       => 'VARCHAR',
                'constraint' => '16',
                'null'       => true,
                'after'      => 'nik_santri',
            ],
            'tempat_lahir' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
                'after'      => 'no_kk',
            ],
            'nama_ibu' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
                'after'      => 'tempat_lahir',
            ],
            'nik_ibu' => [
                'type'       => 'VARCHAR',
                'constraint' => '16',
                'null'       => true,
                'after'      => 'nama_ibu',
            ],
            'nama_ayah' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
                'after'      => 'nik_ibu',
            ],
            'nik_ayah' => [
                'type'       => 'VARCHAR',
                'constraint' => '16',
                'null'       => true,
                'after'      => 'nama_ayah',
            ],
            'file_kk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                "default" => "default.jpg",
                'after'      => 'nik_ayah',
            ],
            'file_akte' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                "default" => "default.jpg",
                'after'      => 'file_kk',
            ],
            'file_ijazah' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                "default" => "default.jpg",
                'after'      => 'file_akte',
            ],
            'file_skhu' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                "default" => "default.jpg",
                'after'      => 'file_ijazah',
            ],
            'motto' => [
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'file_skhu',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('santri', [
            'nisn',
            'nik_santri',
            'no_kk',
            'tempat_lahir',
            'nama_ibu',
            'nik_ibu',
            'nama_ayah',
            'nik_ayah',
            'file_kk',
            'file_akte',
            'file_ijazah',
            'file_skhu',
            'motto',
        ]);
    }
}
