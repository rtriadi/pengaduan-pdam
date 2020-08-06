<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MeterPelanggan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'tanggal_meter' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'meter' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'id_pelanggan' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'created_at' => [
				'type' => 'DATETIME',
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => TRUE,
			],
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->addForeignKey('id_pelanggan', 'pelanggan', 'id_pelanggan', 'cascade', 'cascade');
		$this->forge->createTable('meter_pelanggan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('meter_pelanggan');
	}
}
