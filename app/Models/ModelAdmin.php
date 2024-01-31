<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
  
   public function TotalAnggota()
   {
     return $this->db->table('anggota')->countAll();
   }
   public function TotalBuku()
   {
     return $this->db->table('buku')->countAll();
   }
   public function TotalEbook()
   {
     return $this->db->table('ebook')->countAll();
   }
   public function TotalPeminjaman()
   {
     return $this->db->table('peminjaman')->countAll();
   }
}
