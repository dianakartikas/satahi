<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataSampah extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id_sampah'            => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'jenis_sampah'        => [
                'type'           => 'VARCHAR',
                'constraint'     => '25',

            ],
            'harga'             => [
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
        $this->forge->addKey('id_sampah', TRUE);
        $this->forge->createTable('DataSampah');
    }

    public function down()
    {
        $this->forge->dropTable('DataSampah');
    }
}
