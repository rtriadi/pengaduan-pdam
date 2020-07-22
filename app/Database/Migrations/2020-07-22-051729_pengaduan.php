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
			'id_kategori' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'isi_pengaduan' => [
				'type' => 'TEXT',
			],
			'id_pelanggan' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'id_petugas' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'null' => TRUE,
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
		$this->forge->addForeignKey('id_kategori', 'kategori', 'id_kategori', 'cascade', 'cascade');
		$this->forge->addForeignKey('id_pelanggan', 'pelanggan', 'id_pelanggan', 'cascade', 'cascade');
		$this->forge->createTable('pengaduan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pengaduan');
	}
}
