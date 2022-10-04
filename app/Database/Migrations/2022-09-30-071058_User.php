<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
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
			'username'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'email' => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'name_level_user_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
			],
		]);

		$this->forge->addKey('id', TRUE);

		$this->forge->addForeignKey('name_level_user_id', 'level_users', 'id', 'SET NULL', 'SET NULL');
		$this->forge->createTable('user');
	}

	public function down()
	{
        //
	}
}
