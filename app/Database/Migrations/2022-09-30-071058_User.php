<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
          //list field
		$this->forge->addField([
			'id_number'          => [
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
				'constraint'     => '200'
			],
			'name_level_user_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
			],
		]);

		$this->forge->addKey('id_number', true);
		$this->forge->addKey('name_level_user_id', true);

		$this->forge->createTable('user');
	}

	public function down()
	{
        //
	}
}
