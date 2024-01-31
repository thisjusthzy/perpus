<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ModelKategori;

class Kategori extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelKategori = new ModelKategori;
    }

    public function index()
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'kategori',
            'judul' => 'Kategori',
            'page' => 'v_kategori',
            'kategori' => $this->ModelKategori->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function Add()
    {
        $validate = $this ->validate([
            'nama_kategori' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Kategori Harus Diisi!',
                ],
            ],
        ]);
        if(!$validate) {
            return redirect ()->back()->withInput();
        }
        $data = ['nama_kategori'=>$this->request->getPost('nama_kategori')];
        $this->ModelKategori->Add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('kategori'));
    }


    public function EditData($id_kategori)
    {
        $validate = $this ->validate([
            'nama_kategori' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Kategori Harus Diisi!',
                ],
            ],
        ]);

        if(!$validate) {
            return redirect ()->back()->withInput();
        }
        $data = ['nama_kategori'=>$this->request->getPost('nama_kategori')];
        $this->ModelKategori->Add($data);
        session()->setFlashdata('pesan', 'Data Berhasil DiUpdate');
        return redirect()->to(base_url('kategori'));
    }

    public function DeleteData($id_kategori)
    {
        $data = ['id_kategori'=> $id_kategori];
        $this->ModelKategori->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to(base_url('kategori'));
    }
}
