<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengaturan extends Model
{
   
    public function DetailWeb()
   {
     return $this->db->table('web')
        ->where('id_web', '1')
        ->get()->getRowArray();
   }

   public function UpdateWeb($data)
   {
      $this->db->table('web')
         ->where('id_web' , $data['id_web'])
         ->update($data);
   }

   public function Slider()
   {
     return $this->db->table('slider')
        ->orderBy('id_slider','ASC')
        ->get()->getResultArray();
   }
   public function DetailSlider($id_slider)
   {
     return $this->db->table('slider')
     ->where('id_slider' , $id_slider)
     ->get()->getRowArray();
   }
   public function UpdateSlider($data)
   {
      $this->db->table('slider')
         ->where('id_slider' , $data['id_slider'])
         ->update($data);
   }
}
