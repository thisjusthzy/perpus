<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Slider extends Migration
{
    public function up()
    {
        
        $this->forge->addField([
            'id_slider' => [
                'type'           => 'INT',
                'constraint'     => 2,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'slider' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id_slider', true);
        $this->forge->createTable('slider');
    }

    public function down()
    {
        $this->forge->dropTable('slider');
    }
}
