<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Petugas extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_petugas' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'username_petugas' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'password_petugas' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'level' => [
				'type' => 'TINYINT',
				'constraint' => 1,
			],
			'nama_lengkap_petugas' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'jenis_kelamin_petugas' => [
				'type' => 'CHAR',
				'constraint' => 1,
			],
			'no_hp_petugas' => [
				'type' => 'CHAR',
				'constraint' => 15,
			],
			'alamat_petugas' => [
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
		$this->forge->addKey('id_petugas', TRUE);
		$this->forge->createTable('petugas');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('petugas');
	}
}
