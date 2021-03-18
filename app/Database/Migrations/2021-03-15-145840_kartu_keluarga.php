<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KartuKeluarga extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_kk' => [
				'type'	=> 'INT',
				'constraint' 		=> 20,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE,
			],
			'no_kk' => [
				'type' => 'VARCHAR',
				'constraint' => 16,
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'jenis_kelamin' => [
				'type' => 'enum',
				'constraint' => ['l', 'p']
			],
			'agama' => [
				'type' => 'enum',
				'constraint' => ['islam', 'protestan', 'katolik', 'hindu', 'buddha', 'konghucu']
			],
			'pekerjaan' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255
			],
			'status_hubungan' => [
				'type'			=> 'enum',
				'constraint'	=> ['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Famili Lain', 'Lainnya']
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
		$this->forge->addKey('id_kk', TRUE);
		$this->forge->addForeignKey('user_id', 'users', 'id');
		$this->forge->createTable('kartu_keluarga');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('kartu_keluarga');
	}
}
