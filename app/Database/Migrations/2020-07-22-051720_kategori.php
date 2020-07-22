<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_kategori' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'nama_kategori' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'created_at' => [
				'type' => 'DATETIME',
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => TRUE,
			],
		]);
		$this->forge->addKey('id_kategori', TRUE);
		$this->forge->createTable('kategori');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('kategori');
	}
}
