<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengunjung extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_pengunjung' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'ip_address' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'date' => [
				'type' => 'date',
			],
			'hits' => [
				'type' => 'int',
				'constraint' => '11',
			],
			'online' => [
				'type' => 'varchar',
				'constraint' => '255',
			],
			'time' => [
				'type' 	=> 'datetime',
				'null'	=> true
			],
		]);

		$this->forge->addKey('id_pengunjung', TRUE);
		$this->forge->createTable('pengunjung');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pengunjung');
	}
}
