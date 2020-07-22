<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_pelanggan' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'nama_lengkap' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'jenis_kelamin' => [
				'type' => 'CHAR',
				'constraint' => 1,
			],
			'no_hp' => [
				'type' => 'CHAR',
				'constraint' => 15,
			],
			'alamat' => [
				'type' => 'TEXT',
			],
			'created_at' => [
				'type' => 'DATETIME',
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => TRUE,
			],
		]);
		$this->forge->addKey('id_pelanggan', TRUE);
		$this->forge->createTable('pelanggan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pelanggan');
	}
}
