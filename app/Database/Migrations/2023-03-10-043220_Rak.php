<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rak extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_rak' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_rak' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'lantai_rak' => [
                'type' => 'INT',
                'constraint' => '2',
            ],
        ]);
        $this->forge->addKey('id_rak', true);
        $this->forge->createTable('rak');
    }

    public function down()
    {
        $this->forge->dropTable('rak');
    }
}
