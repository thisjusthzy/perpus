<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Buku extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_buku' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_buku' => [
                'type'       => 'INT',
                'constraint' => '20',
                'null' => true,
            ],
            'judul_buku' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'id_kategori' => [
                'type'       => 'INT',
                'constraint' => '2',
                'null' => true,
            ],
            'id_penulis' => [
                'type'       => 'INT',
                'constraint' => '2',
                'null' => true,
            ],
            'id_penerbit' => [
                'type'       => 'INT',
                'constraint' => '2',
                'null' => true,
            ],
            'id_rak' => [
                'type'       => 'INT',
                'constraint' => '2',
                'null' => true,
            ],
            'isbn' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'tahun' => [
                'type'       => 'YEAR',
                'constraint' => '4',
                'null' => true,
            ],
            'bahasa' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'halaman' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null' => true,
            ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null' => true,
            ],
            'cover' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'jml_tersedia' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null' => true,
            ],
            'jml_dipinjam' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_buku', true);
        $this->forge->createTable('buku');
    }

    public function down()
    {
        $this->forge->dropTable('buku');

    }
}
