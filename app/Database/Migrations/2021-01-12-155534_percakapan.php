<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Percakapan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_percakapan' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'pengaduan_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'percakapan' => [
				'type' => 'TEXT',
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

		$this->forge->addKey('id_percakapan', TRUE);
		$this->forge->addForeignKey('user_id', 'users', 'id');
		$this->forge->addForeignKey('pengaduan_id', 'pengaduan', 'id_pengaduan');
		$this->forge->createTable('percakapan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('percakapan');
	}
}
