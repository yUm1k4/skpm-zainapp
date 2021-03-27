<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RukunTetangga extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_rt' => [
				'type'	=> 'INT',
				'constraint' 		=> 20,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE,
			],
			'rw_id'		=> [
				'type'			=> 'int',
				'constraint'	=> 11,
				'unsigned'		=> true
			],
			'no_rt' => [
				'type' => 'VARCHAR',
				'constraint' => 11,
			],
			'nama_rt' => [
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
		$this->forge->addKey('id_rt', TRUE);
		$this->forge->addForeignKey('rw_id', 'rukun_warga', 'id_rw');
		$this->forge->createTable('rukun_tetangga');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('rukun_tetangga');
	}
}
