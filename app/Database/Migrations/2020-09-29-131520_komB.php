<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Buku extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'alamat'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'created_at'       => [
				'type'           => 'DATETIME',
				'constraint'     => true,
			],
			'updated_at'       => [
				'type'           => 'DATETIME',
				'constraint'     => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('komB');
	}

	public function down()
	{
		$this->forge->dropTable('komB');
	}
}
