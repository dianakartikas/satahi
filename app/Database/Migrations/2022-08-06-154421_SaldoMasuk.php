<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SaldoMasuk extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id_masuk'       => [
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
            'jumlah_masuk'        => [
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
        $this->forge->addKey('id_masuk', TRUE);
        $this->forge->addForeignKey('id_nasabah', 'DataNasabah', 'id_nasabah', '', 'CASCADE');
        $this->forge->createTable('SaldoMasuk');
    }

    public function down()
    {
        $this->forge->dropTable('SaldoMasuk');
    }
}
