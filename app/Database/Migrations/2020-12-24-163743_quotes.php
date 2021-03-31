<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Quotes extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_quotes'	=> [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'quote'		=> [
				'type'			=> 'text',
			]
		]);
		$this->forge->addKey('id_quotes', true);
		$this->forge->createTable('quotes');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('quotes');
	}
}
