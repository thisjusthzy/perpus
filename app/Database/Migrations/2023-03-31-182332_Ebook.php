<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ebook extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ebook' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul_ebook' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
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
            'isbn' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
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
            'file_ebook' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_ebook', true);
        $this->forge->createTable('ebook');
    }

    public function down()
    {
        $this->forge->dropTable('ebook');
    }
}
