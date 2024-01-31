<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penerbit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penerbit' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_penerbit' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id_penerbit', true);
        $this->forge->createTable('Penerbit');
    }

    public function down()
    {
        $this->forge->dropTable('Penerbit');
    }

}
