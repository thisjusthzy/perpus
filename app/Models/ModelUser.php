<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    public function AllData()
   {
     return $this->db->table('user')
        ->orderBy('id_user','DESC')
        ->get()->getResultArray();
   }

   public function DetailData($id_user)
   {
     return $this->db->table('user')
        ->where('id_user',$id_user)
        ->get()->getRowArray();
   }

   public function AddData($data)
    {
        $this->db->table('user')->insert($data);
    }


   public function DeleteData($data)
   {
      $this->db->table('user')
            ->where('id_user',$data['id_user'])
            ->delete($data);
   }

   public function EditData($data)
   {
      $this->db->table('user')
            ->where('id_user',$data['id_user'])
            ->update($data);
   }
}
