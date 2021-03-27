<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FilterKatakotor extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_filter' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'kata_kotor' => [
				'type'	=> 'VARCHAR',
				'constraint' => 255
			],
			'filter_kata' => [
				'type' => 'VARCHAR',
				'constraint' => 22
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

		$this->forge->addKey('id_filter', TRUE);
		$this->forge->createTable('filter_kata_kotor');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('filter_kata_kotor');
	}
}
