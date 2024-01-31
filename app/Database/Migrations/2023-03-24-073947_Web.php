<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Web extends Migration
{
    public function up()
    {
         $this->forge->addField([
            'id_web' => [
                'type'           => 'INT',
                'constraint'     => 1,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_sekolah' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'kecamatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'kab_kota' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'no_telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
                'null' => true,
            ],
            'logo' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'sejarah' => [
                'type'       => 'TEXT',
                'constraint' => '',
                'null' => true,
            ],
            'visi' => [
                'type'       => 'TEXT',
                'constraint' => '',
                'null' => true,
            ],
            'misi' => [
                'type'       => 'TEXT',
                'constraint' => '',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_web', true);
        $this->forge->createTable('web');
    }

    public function down()
    {
            $this->forge->dropTable('web');
    }
}
