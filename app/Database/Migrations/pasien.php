<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class pasien extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'nisn'    => [
				'type'       => 'VARCHAR',
				'constraint' => '16',
			],
			'nama'    => [
				'type'       => 'VARCHAR',
				'constraint' => '64',
			],
		]);
		$this->forge->addPrimaryKey('id', true);
		$this->forge->createTable('pasien');
	}

	public function down()
	{
		//
		$this->forge->dropTable('pasien');
	}
}