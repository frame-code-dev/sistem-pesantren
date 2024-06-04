<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserImage extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
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
        $this->forge->dropColumn('users', 'image');
    }
}
