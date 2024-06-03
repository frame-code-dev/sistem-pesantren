<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldBerita extends Migration
{
    public function up()
    {
        // $this->forge->modifyColumn('berita_acara', [
        //     'keterangan' => [
        //         'type'       => 'BINARY',
        //         "name" => "content"
        //     ],
        // ]);
        $this->forge->addColumn('berita_acara', [
            'user_id' => [
                'type'       => 'INTEGER',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
            ],
            'content' => [
                'type'       => 'BINARY',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('berita_acara', [
            'content' => [
                'type'       => 'BINARY',
                "name" => "keterangan"
            ],
        ]);
        $this->forge->dropColumn('berita_acara', [
            'user_id',
            'slug',
            "content"
        ]);
    }
}
