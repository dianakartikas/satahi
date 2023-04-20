<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataTransaksi extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id_transaksi'       => [
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
            'id_sampah'        => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'null'              => TRUE
            ],
            'satuan'        => [
                'type'           => 'INT',
                'constraint'     => '25',
            ],
            'total'        => [
                'type'           => 'INT',
                'constraint'     => '25',
            ],
            'gambar'             => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
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
        $this->forge->addKey('id_transaksi', TRUE);
        $this->forge->addForeignKey('id_nasabah', 'DataNasabah', 'id_nasabah', '', 'CASCADE');
        $this->forge->addForeignKey('id_sampah', 'DataSampah', 'id_sampah', '', 'CASCADE');
        $this->forge->createTable('DataTransaksi');
    }

    public function down()
    {
        $this->forge->dropTable('DataTransaksi');
    }
}
