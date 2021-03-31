<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PengaduanKategori extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_pengaduan_kategori' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'nama_kategori' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			]
		]);

		$this->forge->addKey('id_pengaduan_kategori', TRUE);
		$this->forge->createTable('pengaduan_kategori');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pengaduan_kategori');
		//
	}
}
