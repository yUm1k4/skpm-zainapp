<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Testimoni extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_testimoni' => [
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
			'testimoni' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'pekerjaan' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255
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

		$this->forge->addKey('id_testimoni', TRUE);
		$this->forge->addForeignKey('user_id', 'users', 'id');
		$this->forge->createTable('testimoni');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('testimoni');
	}
}
