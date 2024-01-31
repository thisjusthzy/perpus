<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPengaturan;

class Pengaturan extends BaseController
{
    public function __construct()
    {
            helper('form');
            $this->ModelPengaturan = new ModelPengaturan();
    }
    public function web()
    {
        $data = [
            'menu' => 'pengaturan',
            'submenu' => 'web',
            'judul' => 'Pengaturan WEB',
            'page' => 'v_pengaturan_web',
            'web'  => $this->ModelPengaturan->DetailWeb(),
        ];
        return view('v_template_admin', $data);
    }
    public function UpdateWeb()
    {
        $validate = $this ->validate([
            'nama_sekolah' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama SekolahHarus Diisi!',
                ],
            ],
        ]);
    
        $validate = $this ->validate([
            'alamat' => [
                'rules'  => 'required',
                'errors' =>     [
                    'required' => 'Alamat Harus Diisi!',
                ],
            ],
        ]);
        $validate = $this ->validate([
            'kecamatan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kecamatan Harus Diisi!',
                ],
            ],
        ]);
        $validate = $this ->validate([
            'no_telepon' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'No Handphone Harus Diisi!',
                ],
            ],
        ]);
        $validate = $this ->validate([
            'kab_kota' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi!',
                ],
            ],
        ]);
        $validate = $this ->validate([
            'sejarah' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi!',
                ],
            ],
        ]);
        $validate = $this ->validate([
            'visi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi!',
                ],
            ],
        ]);
        $validate = $this ->validate([
            'misi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi!',
                ],
            ],
        ]);
    
        $validate = $this ->validate([
            'logo' => [
                'rules'  => 'max_size[logo,1024]|mime_in[logo,image/png]',
                'errors' => [
                    'max_size' =>  '{field} Max 1024 Kb!',
                    'mime_in' =>  ' Format {field} Harus PNG',
                ],
            ],
        ]);
        $logo = $this->request->getFile('logo');
        if($validate) {
            //return redirect ()->back()->withInput();
              //jika lolos validasi
    
            if ($logo->getError() == 4) {
                //jika tidak ganti gambar
                $nama_file = $logo->getRandomName();
                $data = [
                    'id_web' => '1',
                    'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                    'alamat' => $this->request->getPost('alamat'),
                    'kecamatan' => $this->request->getPost('kecamatan'),
                    'kab_kota' => $this->request->getPost('kab_kota'),
                    'no_telepon' => $this->request->getPost('no_telepon'),
                    'sejarah' => $this->request->getPost('sejarah'),
                    'visi' => $this->request->getPost('visi'),
                    'misi' => $this->request->getPost('misi'),
                ];
                $this->ModelPengaturan->UpdateWeb($data);
            } else {
                //hapus foto
                $web = $this->ModelPengaturan->DetailWeb();
                if ($web['logo'] <> '') {
                    unlink('logo/' . $web['logo']);
                }
                // ganti gambar
                $nama_file = $logo->getRandomName();
                 $data = [
                    'id_web' => '1',
                    'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                    'alamat' => $this->request->getPost('alamat'),
                    'kecamatan' => $this->request->getPost('kecamatan'),
                    'kab_kota' => $this->request->getPost('kab_kota'),
                    'no_telepon' => $this->request->getPost('no_telepon'),
                    'sejarah' => $this->request->getPost('sejarah'),
                    'visi' => $this->request->getPost('visi'),
                    'misi' => $this->request->getPost('misi'),
                    'logo' => $nama_file,
              ];
              // upload file foto
              $logo->move('logo', $nama_file);
              $this->ModelPengaturan->UpdateWeb($data);
            }
            //lolos validasi
              session()->setFlashdata('pesan', 'Data Web Berhasil DiUpdate Cuy!');
              return redirect()->to(base_url('Pengaturan/web'));
          }else {
              //jika tidak lolos validasi
              session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
              return redirect()->to(base_url('Pengaturan/web/'));
       }
    
    }

    public function Slider()
    {
        $data = [
            'menu' => 'pengaturan',
            'submenu' => 'slider',
            'judul' => 'Data Slider',
            'page' => 'v_slider',
            'slider'  => $this->ModelPengaturan->Slider(),
        ];
        return view('v_template_admin', $data);
    }

    public function EditSlider($id_slider)
    {
        if ($this->validate([
            'slider' => [
                'label' => 'Gambar Slider',
                'rules' => 'uploaded[slider]|max_size[slider,2048]|mime_in[slider,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' =>  '{field} Harus JPG PNG JPEG !',
                ]
            ],
        ])) {
            $slider = $this->request->getFile('slider');
            // hapus foto lama
            $file = $this->ModelPengaturan->DetailSlider($id_slider);
            if ($file['slider'] <> '') {
                unlink('slider/' . $file['slider']);
            }
            //jika ganti gambar
            $nama_file = $slider->getRandomName();
            $data = [
                'id_slider' => $id_slider,
                'slider' => $nama_file,
            ];

            $slider->move('slider', $nama_file);
            $this->ModelPengaturan->UpdateSlider($data);

            session()->setFlashdata('pesan', 'Slider Berhasil Diganti !');
            return redirect()->to(base_url('Pengaturan/Slider'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
             return redirect()->to(base_url('Pengaturan/Slider'));
        }
        
    }
}