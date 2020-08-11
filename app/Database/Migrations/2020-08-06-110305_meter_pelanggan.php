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
				'type' => 'DATE',
			],
			'meter' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'no_sambung' => [
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
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('meter_pelanggan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('meter_pelanggan');
	}
}
