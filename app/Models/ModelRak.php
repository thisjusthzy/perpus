<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRak extends Model
{
    public function AllData()
   {
     return $this->db->table('rak')
        ->orderBy('id_rak','DESC')
        ->get()->getResultArray();
   }

   public function AddData($data)
   {
      $this->db->table('rak')->insert($data);
   }

   public function DeleteData($data)
   {
      $this->db->table('rak')
            ->where('id_rak',$data['id_rak'])
            ->delete($data);
   }

   public function EditData($data)
   {
      $this->db->table('rak')
            ->where('id_rak',$data['id_rak'])
            ->update($data);
   }
}
