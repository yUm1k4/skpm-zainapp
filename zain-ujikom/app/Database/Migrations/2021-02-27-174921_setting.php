<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Setting extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_setting' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'nama_aplikasi_frontend' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255
			],
			'nama_aplikasi_backend' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255
			],
			'nohp_setting' => [
				'type'	=> 'VARCHAR',
				'constraint' => 15
			],
			'alamat_setting' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255
			],
			'email_setting' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255
			],
			'map_link' => [
				'type'	=> 'TEXT',
			],
			'footer_frontend' => [
				'type'	=> 'TEXT'
			],
			'footer_backend' => [
				'type'	=> 'TEXT'
			],
			'lc_1_nama' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'lc_1_url' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'lc_2_nama' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'lc_2_url' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'lc_3_nama' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'lc_3_url' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'lc_4_nama' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'lc_4_url' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'lc_5_nama' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'lc_5_url' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'somed_1_font' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'somed_1_url' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'somed_2_font' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'somed_2_url' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'somed_3_font' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'somed_3_url' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'somed_4_font' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'somed_4_url' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'somed_5_font' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
			],
			'somed_5_url' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
				'null'	=> true
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

		$this->forge->addKey('id_setting', TRUE);
		$this->forge->createTable('setting');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('setting', true);
	}
}
