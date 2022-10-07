<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LevelUser extends Migration
{
    public function up()
    {
        //list field
        $this->forge->addField([
            'id'          => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => TRUE,
                    'auto_increment' => TRUE
            ],
            'name_level_user'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '50',
            ]
        ]);

        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('level');
    }

    public function down()
    {
        //
    }
}
