<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPenulis;

class Penulis extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelPenulis = new ModelPenulis;
    }

    public function index()
    {
        
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'penulis',
            'judul' => 'Penulis',
            'page' => 'v_penulis',
            'penulis' => $this->ModelPenulis->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function AddData()
    {
        $validate = $this ->validate([
            'nama_penulis' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Penulis Harus Diisi!',
                ],
            ],
        ]);
        if(!$validate) {
            return redirect ()->back()->withInput();
        }
        $data = ['nama_penulis'=>$this->request->getPost('nama_penulis')];
        $this->ModelPenulis->AddData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('Penulis'));
    }

    public function EditData($id_penulis)
    {
        $data = [
            'id_penulis' => $id_penulis,
            'nama_penulis'=>$this->request->getPost('nama_penulis')
        ];
        $this->ModelPenulis->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil DiUpdate bray!');
        return redirect()->to(base_url('penulis'));
    }
    public function DeleteData($id_penulis)
    {
        $data = [
            'id_penulis' => $id_penulis,
        ];
        $this->ModelPenulis->DeleteData($data);
        session()->setFlashdata('pesan', ' Anjay Data Berhasil DiHapus!');
        return redirect()->to(base_url('Penulis'));
    }
 
}
