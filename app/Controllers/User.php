<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ModelUser;
 
class User extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelUser = new ModelUser;
    }

    public function index()
    {
        
        $data = [
            'menu' => 'pengaturan',
            'submenu' => 'user',
            'judul' => 'User',
            'page' => 'user/v_index',
            'user' => $this->ModelUser->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function AddData()
    { 
        $data = [
            'menu' => 'pengaturan',
            'submenu' => 'user',
            'judul' => 'Tambah Data User',
            'page' => 'user/v_adddata',
        ];
        return view('v_template_admin', $data);
    }

    public function SimpanData()
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi!'
                ]
            ],
            'email' => [
                'label' => 'E-Mail',
                'rules' => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => '{field} Harus Diisi!',
                    'is_unique' => '{field} Sudah Digunakan, Cari E-Mail Lain !'
                ]
            ],
            'no_hp' => [
                'label' => 'No Handphone',
                'rules' => 'required|is_unique[user.no_hp]',
                'errors' => [
                    'required' => '{field} Harus Diisi!',
                    'is_unique' => '{field} Sudah Digunakan, Cari Nomor Lain !'
                ]
            ],
            'level' => [
                'label' => 'Level',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi!'
                ]
            ],
            'foto' => [
                'label' => 'Foto User',
                'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/gif/,image/jpeg,imager/ico]',
                'errors' => [
                    'uploaded' => '{field} Foto Harus Diisi!',
                    'max_size' => '{field} Max 1024 Kb!',
                    'mime_in' => ' Format {field} Harus JPG PNG JPEG GIF !'
                ]
            ],
        ])) {
        
            //jika lolos validasi
         $foto = $this->request->getFile('foto');
         $nama_file = $foto->getRandomName();

            $data = [
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'no_hp' => $this->request->getPost('no_hp'),
                'level' => $this->request->getPost('level'),
                'foto' => $nama_file,
            ];
            $foto->move('foto', $nama_file);
            $this->ModelUser->AddData($data);
            session()->setFlashdata('pesan', 'Data Buku Berhasil Ditambahkan !');
            return redirect()->to(base_url('User'));
        }else {
            //jika tidak lolos validasi
          session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
          return redirect()->to(base_url('User/AddData/'))->withInput('validation', \Config\Services::validation());
        }
}

public function EditData($id_user)
{ 
    
    $data = [
        'menu' => 'pengaturan',
        'submenu' => 'user',
        'judul' => 'Edit Data User',
        'page' => 'user/v_editdata',
        'user' => $this->ModelUser->DetailData($id_user),
    ];
    return view('v_template_admin', $data);
}

public function UpdateData($id_user)
{
    if ($this->validate([
        'nama_user' => [
            'label' => 'Nama User',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Harus Diisi!'
            ]
        ],
        'password' => [
            'label' => 'Password',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Harus Diisi!'
            ]
        ],
        'email' => [
            'label' => 'E-Mail',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Harus Diisi!',
            ]
        ],
        'no_hp' => [
            'label' => 'No Handphone',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Harus Diisi!',
            ]
        ],
        'level' => [
            'label' => 'Level',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Harus Diisi!'
            ]
        ],
        'foto' => [
            'label' => 'Foto User',
            'rules' => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/gif/,image/jpeg,imager/ico]',
            'errors' => [
                'max_size' => '{field} Max 1024 Kb!',
                'mime_in' => ' Format {field} Harus JPG PNG JPEG GIF !'
            ]
        ],
    ])) {
    
        //jika lolos validasi
     $foto = $this->request->getFile('foto');
     if ($foto->getError() == 4) {
         //jika tidak ganti foto
         $nama_file = $foto->getRandomName();
            $data = [
                'id_user' => $id_user,
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'no_hp' => $this->request->getPost('no_hp'),
                'level' => $this->request->getPost('level'),
            ];
         
     } else {
         //jika ganti foto
         $nama_file = $foto->getRandomName();
         $data = [
            'id_user' => $id_user,
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'no_hp' => $this->request->getPost('no_hp'),
                'level' => $this->request->getPost('level'),
                'foto' => $nama_file,
            ];
         
         $foto->move('foto', $nama_file);
         $this->ModelUser->EditData($data);
     }

     session()->setFlashdata('pesan', 'Data Buku Berhasil DiUpdate !');
     return redirect()->to(base_url('User'));
 } else {
     //jika tidak lolos validasi
     session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
     return redirect()->to(base_url('User/EditData/' . $id_user));
 }
}

public function DeleteData($id_user)
{
    $user = $this->ModelUser->DetailData($id_user);
if (!empty($user['foto']) && file_exists('foto/' . $user['foto'])) {
    unlink('foto/' . $user['foto']);
}

    $data = ['id_user'=> $id_user];
    $this->ModelUser->DeleteData($data);
    session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
    return redirect()->to(base_url('User'));
}

}


