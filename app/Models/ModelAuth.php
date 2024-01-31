<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
   public function LoginUser($email, $password)
   {
        return $this->db->table('user')
            ->where([
                'email' => $email,
                'password' => $password,
            ])->get()->getRowArray();
   }

   public function Daftar($data)
   {
    $this->db->table('anggota')->insert($data);
   }
   
   public function LoginAnggota($nis, $password)
   {
        return $this->db->table('anggota')
            ->where([
                'nis' => $nis,
                'password' => $password,
            ])->get()->getRowArray();
   }
}
