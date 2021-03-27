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
			'kode_pengaduan' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'petugas_id' => [
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
		$this->forge->createTable('percakapan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('percakapan');
	}
}
