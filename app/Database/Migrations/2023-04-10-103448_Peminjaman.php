<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peminjaman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pinjam' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
        
            'no_pinjam' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'tgl_pengajuan' => [
                'type'       => 'DATE',
                'constraint' => '',
                'null' => true,
            ],
            'id_anggota' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null' => true,
            ],
            'tgl_pinjam' => [
                'type'       => 'DATE',
                'constraint' => '',
                'null' => true,
            ],
            'id_buku' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null' => true,
            ],
            'qty' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null' => true,
            ],
            'lama_pinjam' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null' => true,
            ],
            'tgl_harus_kembali' => [
                'type'       => 'DATE',
                'constraint' => '',
                'null' => true,
            ],
            'tgl_kembali' => [
                'type'       => 'DATE',
                'constraint' => '',
                'null' => true,
            ],
            'keterlambatan' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null' => true,
            ],
            'denda' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null' => true,
            ],
            'status_pinjam' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
                'null' => true,
            ],
            'ket' => [
                'type'       => 'TEXT',
                'constraint' => '',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_pinjam', true);
        $this->forge->createTable('peminjaman');
    }

    public function down()
    {
        $this->forge->dropTable('peminjaman');
    }
}
