<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSantriImage extends Migration
{
    public function up()
    {
        $this->forge->addColumn('santri', [
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                "after" => "nama",
                "default" => "default.jpg"
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('santri', 'image');
    }
}
