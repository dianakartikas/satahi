<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataNasabah extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id_nasabah'            => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'nama'        => [
                'type'           => 'VARCHAR',
                'constraint'     => '25',

            ],
            'no_rekening'        => [
                'type'           => 'VARCHAR',
                'constraint'     => '25',

            ],
            'no_hp'             => [
                'type'           => 'VARCHAR',
                'constraint'     => '25',
            ],
            'alamat'             => [
                'type'           => 'VARCHAR',
                'constraint'     => '25',
            ],
            'saldo'             => [
                'type'           => 'VARCHAR',
                'constraint'     => '25',
            ],
            'user_image'             => [
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
        $this->forge->addKey('id_nasabah', TRUE);
        $this->forge->createTable('DataNasabah');
    }

    public function down()
    {
        $this->forge->dropTable('DataNasabah');
    }
}
