<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengaduan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_pengaduan'	=> [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'user_id'		=> [
				'type'			=> 'int',
				'constraint'	=> 11
			],
			'isi_laporan'	=> [
				'type'			=> 'longtext',
			],
			'status'		=> [
				'type'			=> 'varchar',
				'constraint'	=> 255
			],
			'foto'			=> [
				'type'			=> 'varchar',
				'constraint'	=> 255
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
		$this->forge->addKey('id_pengaduan', true);
		$this->forge->createTable('pengaduan');
	}

	public function down()
	{
		$this->forge->dropTable('pengaduan');
	}
}
