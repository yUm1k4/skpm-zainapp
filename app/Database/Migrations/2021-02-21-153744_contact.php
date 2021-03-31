<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Contact extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_contact' => [
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
			'subject' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'nama_lengkap' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'pesan' => [
				'type' => 'LONGTEXT',
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

		$this->forge->addKey('id_contact', TRUE);
		$this->forge->addForeignKey('user_id', 'users', 'id');
		$this->forge->createTable('contact');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('contact');
		//
	}
}
