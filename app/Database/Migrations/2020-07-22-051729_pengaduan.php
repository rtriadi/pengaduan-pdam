<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengaduan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_pengaduan' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'id_pelanggan' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'pengaduan' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'penyelesaian_pengaduan' => [
				'type' => 'TEXT',
				'null' => TRUE,
			],
			'id_petugas' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'null' => TRUE,
			],
			'status' => [
				'type' => 'TINYINT',
				'constraint' => 1,
			],
			'created_at' => [
				'type' => 'DATETIME',
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => TRUE,
			],
		]);
		$this->forge->addKey('id_pengaduan', TRUE);
		$this->forge->addForeignKey('id_pelanggan', 'pelanggan', 'id_pelanggan', 'cascade', 'cascade');
		$this->forge->createTable('pengaduan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pengaduan');
	}
}
