<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeminjaman extends Model
{
   public function AddData($data)
   {
        $this->db->table('peminjaman')->insert($data);
   }

   public function PengajuanBuku($id_anggota)
     {
        return $this->db->table('peminjaman')
        ->join('buku','buku.id_buku = peminjaman.id_buku', 'left')
        ->join('kategori','kategori.id_kategori = buku.id_kategori', 'left')
        ->join('penerbit','penerbit.id_penerbit = buku.id_penerbit', 'left')
        ->join('penulis','penulis.id_penulis = buku.id_penulis', 'left')
        ->join('rak','rak.id_rak = buku.id_rak', 'left')
        ->where('id_anggota', $id_anggota)
        ->where('status_pinjam', 'Diajukan')
        ->get()->getResultArray();
     }

   public function PengajuanBukuDiterima($id_anggota)
     {
        return $this->db->table('peminjaman')
        ->join('buku','buku.id_buku = peminjaman.id_buku', 'left')
        ->join('kategori','kategori.id_kategori = buku.id_kategori', 'left')
        ->join('penerbit','penerbit.id_penerbit = buku.id_penerbit', 'left')
        ->join('penulis','penulis.id_penulis = buku.id_penulis', 'left')
        ->join('rak','rak.id_rak = buku.id_rak', 'left')
        ->where('id_anggota', $id_anggota)
        ->where('status_pinjam', 'Diterima')
        ->get()->getResultArray();
     }

   public function PengajuanBukuDitolak($id_anggota)
     {
        return $this->db->table('peminjaman')
        ->join('buku','buku.id_buku = peminjaman.id_buku', 'left')
        ->join('kategori','kategori.id_kategori = buku.id_kategori', 'left')
        ->join('penerbit','penerbit.id_penerbit = buku.id_penerbit', 'left')
        ->join('penulis','penulis.id_penulis = buku.id_penulis', 'left')
        ->join('rak','rak.id_rak = buku.id_rak', 'left')
        ->where('id_anggota', $id_anggota)
        ->where('status_pinjam', 'Ditolak')
        ->get()->getResultArray();
     }

    public function DeleteData($data)
    {
       $this->db->table('peminjaman')
             ->where('id_pinjam',$data['id_pinjam'])
             ->delete($data);
    }

    //bagian admin
    public function PengajuanMasuk()
    {
       return $this->db->table('peminjaman')
          ->join('anggota','anggota.id_anggota = peminjaman.id_anggota', 'left')
          ->join('kelas','kelas.id_kelas = anggota.id_kelas', 'left')
          ->where('status_pinjam', 'Diajukan')
          ->selectCount('peminjaman.id_anggota', 'qty')
          ->select('anggota.id_anggota,anggota.nis,anggota.nama_siswa,anggota.foto,kelas.nama_kelas')
          ->groupBy('peminjaman.id_anggota')
          ->get()->getResultArray();
    }

    public function EditData($data)
    {
       $this->db->table('peminjaman')
             ->where('id_pinjam',$data['id_pinjam'])
             ->update($data);
    }

    public function PengajuanDiterima()
     {
       return $this->db->table('peminjaman')
          ->join('anggota','anggota.id_anggota = peminjaman.id_anggota', 'left')
          ->join('kelas','kelas.id_kelas = anggota.id_kelas', 'left')
          ->where('status_pinjam', 'Diterima')
          ->selectCount('peminjaman.id_anggota', 'qty')
          ->select('anggota.id_anggota,anggota.nis,anggota.nama_siswa,anggota.foto,kelas.nama_kelas')
          ->groupBy('peminjaman.id_anggota')
          ->get()->getResultArray();
     }

    public function PengajuanDitolak()
     {
       return $this->db->table('peminjaman')
          ->join('anggota','anggota.id_anggota = peminjaman.id_anggota', 'left')
          ->join('kelas','kelas.id_kelas = anggota.id_kelas', 'left')
          ->where('status_pinjam', 'Ditolak')
          ->selectCount('peminjaman.id_anggota', 'qty')
          ->select('anggota.id_anggota,anggota.nis,anggota.nama_siswa,anggota.foto,kelas.nama_kelas')
          ->groupBy('peminjaman.id_anggota')
          ->get()->getResultArray();
     }

}
