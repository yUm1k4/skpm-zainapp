<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Subscriber extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_subscriber' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'created_at'       => [
				'type' => 'datetime', 'null' => true
			],
			'updated_at'       => [
				'type' => 'datetime', 'null' => true
			],
			'deleted_at'       => [
				'type' => 'datetime', 'null' => true
			],
		]);

		$this->forge->addKey('id_subscriber', TRUE);
		$this->forge->addForeignKey('user_id', 'users', 'id');
		$this->forge->createTable('subscriber');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('subscriber');
		//
	}
}
