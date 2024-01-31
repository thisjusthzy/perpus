<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_user' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'level' => [
                'type' => 'INT',
                'constraint' => '1',
            ],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
   
}
