<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RukunWarga extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_rw' => [
				'type'	=> 'INT',
				'constraint' 		=> 20,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE,
			],
			'no_rw' => [
				'type' => 'VARCHAR',
				'constraint' => 11,
			],
			'nama_rw' => [
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
			]
		]);
		$this->forge->addKey('id_rw', TRUE);
		$this->forge->createTable('rukun_warga');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('rukun_warga');
	}
}
