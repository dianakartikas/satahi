<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SaldoKeluar extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id_keluar'       => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'id_nasabah'        => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'null'              => TRUE

            ],
            'jumlah_keluar'        => [
                'type'           => 'VARCHAR',
                'constraint'     => '25',

            ],
            'created_at'       => [
                'type'           => 'DATETIME',
                // 'default'        => 'current_timestamp()',
            ],
            'updated_at'       => [
                'type'           => 'DATETIME',
                // 'default'        => 'current_timestamp()',
            ]
        ]);
        $this->forge->addKey('id_keluar', TRUE);
        $this->forge->addForeignKey('id_nasabah', 'DataNasabah', 'id_nasabah', '', 'CASCADE');
        $this->forge->createTable('SaldoKeluar');
    }

    public function down()
    {
        $this->forge->dropTable('SaldoKeluar');
    }
}
