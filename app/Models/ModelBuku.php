<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBuku extends Model
{
    public function AllData()
    {
        return $this->db->table('buku')
        ->join('kategori','kategori.id_kategori = buku.id_kategori', 'left')
        ->join('penerbit','penerbit.id_penerbit = buku.id_penerbit', 'left')
        ->join('penulis','penulis.id_penulis = buku.id_penulis', 'left')
        ->join('rak','rak.id_rak = buku.id_rak', 'left')
        ->orderBy('id_buku','DESC')
        ->get()->getResultArray();
    }
 
    public function DetailData($id_buku)
    {
      return $this->db->table('buku')
        ->join('kategori','kategori.id_kategori = buku.id_kategori', 'left')
        ->join('penerbit','penerbit.id_penerbit = buku.id_penerbit', 'left')
        ->join('penulis','penulis.id_penulis = buku.id_penulis', 'left')
        ->join('rak','rak.id_rak = buku.id_rak', 'left')
        ->where('id_buku',$id_buku)
        ->get()->getRowArray();
    }
 
    public function AddData($data)
    {
         $this->db->table('buku')->insert($data);
    }
 
 
    public function DeleteData($data)
    {
       $this->db->table('buku')
             ->where('id_buku',$data['id_buku'])
             ->delete($data);
    }
 
    public function EditData($data)
    {
       $this->db->table('buku')
             ->where('id_buku',$data['id_buku'])
             ->update($data);
    }

    public function getNoKodeBuku()
    {
        $db     = \Config\Database::connect();

        $builder = $db->table('buku');
        $builder->select('RIGHT(buku.kode_buku,2) as kode_buku', FALSE);
        $builder->orderby('kode_buku', 'DESC');
        $builder->limit(1);
        $query  = $builder->get();

        if($query->getFieldCount() <> 0){
            $data = $query->getRow();
            $kode = intval($data->kode_buku) + 1;
        }
        else{
            $kode = 1;
        }
            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $kodetampil = "BK-".$batas;
            return $kodetampil;

            return $query->getResult();
    }
}
