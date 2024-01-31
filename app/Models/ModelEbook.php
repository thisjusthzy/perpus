<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelEbook extends Model
{
    public function AllData()
    {
        return $this->db->table('ebook')
        ->join('kategori','kategori.id_kategori = ebook.id_kategori', 'left')
        ->join('penerbit','penerbit.id_penerbit = ebook.id_penerbit', 'left')
        ->join('penulis','penulis.id_penulis = ebook.id_penulis', 'left')
        ->orderBy('id_ebook','DESC')
        ->get()->getResultArray();
    }
 
    public function DetailData($id_ebook)
    {
      return $this->db->table('ebook')
        ->join('kategori','kategori.id_kategori = ebook.id_kategori', 'left')
        ->join('penerbit','penerbit.id_penerbit = ebook.id_penerbit', 'left')
        ->join('penulis','penulis.id_penulis = ebook.id_penulis', 'left')
        ->where('id_ebook',$id_ebook)
        ->get()->getRowArray();
    }
 
    public function AddData($data)
     {
         $this->db->table('ebook')->insert($data);
     }
 
 
    public function DeleteData($data)
    {
       $this->db->table('ebook')
             ->where('id_ebook',$data['id_ebook'])
             ->delete($data);
    }
 
    public function EditData($data)
    {
       $this->db->table('ebook')
             ->where('id_ebook',$data['id_ebook'])
             ->update($data);
    }
}
