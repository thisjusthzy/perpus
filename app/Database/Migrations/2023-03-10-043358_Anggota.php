<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Anggota extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_anggota' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nis' => [
                'type'       => 'INT',
                'constraint' => '10',
                'null' => true,
            ],
            'nama_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'alamat' => [
                'type' => 'TEXT',
                'constraint' => '',
                'null' => true,
            ],
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => true,
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'id_kelas' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'verifikasi' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_anggota', true);
        $this->forge->createTable('anggota');
    }

    public function down()
    {
        $this->forge->dropTable('anggota');
    }
}
