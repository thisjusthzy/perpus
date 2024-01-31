<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelEbook;
use App\Models\ModelKategori;
use App\Models\ModelPenulis;
use App\Models\ModelPenerbit;

class Ebook extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelEbook = new ModelEbook;
        $this->ModelKategori = new ModelKategori;
        $this->ModelPenerbit = new ModelPenerbit;
        $this->ModelPenulis = new ModelPenulis;
    }

    public function index()
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'ebook',
            'judul' => 'E-Book',
            'page' => 'ebook/v_index',
            'ebook' => $this->ModelEbook->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    public function AddData()
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'ebook',
            'judul' => 'E-Book',
            'page' => 'ebook/v_adddata',
            'kategori' => $this->ModelKategori->AllData(),
            'penulis' => $this->ModelPenulis->AllData(),
            'penerbit' => $this->ModelPenerbit->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    
    public function SimpanData()
    {
        if ($this->validate([

            'judul_ebook'=> [
                'label' =>'Judul E-Book',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong',
                ]
            ],
            'id_kategori'=> [
                'label' =>'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong',
                ]
            ],
            'id_penerbit'=> [
                'label' =>'Penerbit',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong',

                ]
            ],     
            'id_penulis'=> [
                'label' =>'Penulis',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ],        
            'tahun'=> [
                'label' =>'Tahun',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ],     
            'bahasa'=> [
                'label' =>'Bahasa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ],     
            'halaman'=> [
                'label' =>'Halaman',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ],     
           
            'cover' => [
                'label' => 'Cover Buku',
                'rules' => 'uploaded[cover]|max_size[cover,2048]|mime_in[cover,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} Wajib Di isi !',
                    'max_size' => '{field} Max  2048 Kb!',
                    'mime_in' => 'Format {field} Harus  JPG,PNG,JPEG !',
                ]   
            ],
            'ebooks' => [
                'label' => 'File Ebook',
                'rules' => 'uploaded[ebooks]|max_size[ebooks,2048]|ext_in[ebooks,pdf]',
                'errors' => [
                    'uploaded' => '{field} Wajib Di isi !',
                    'max_size' => '{field} Max  2048 Kb!',
                    'ext_in' => 'Format {field} Harus .PDF !',
                ]   
            ],
         ])) {

         $cover = $this->request->getFile('cover');
         $nama_file = $cover->getRandomName();

         $ebook = $this->request->getFile('ebooks');
         $ebooks_file = $ebook->getRandomName();

            $data = [
                'judul_ebook' => $this->request->getPost('judul_ebook'),
                'isbn' => $this->request->getPost('isbn'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_penulis' => $this->request->getPost('id_penulis'),
                'id_penerbit' => $this->request->getPost('id_penerbit'),
                'tahun' => $this->request->getPost('tahun'),
                'bahasa' => $this->request->getPost('bahasa'),
                'halaman' => $this->request->getPost('halaman'),
                'jumlah' => $this->request->getPost('jumlah'),
                'cover' => $nama_file,
                'ebooks' => $ebooks_file,
            ];
            
            $cover->move('cover', $nama_file);
            $ebook->move('ebooks', $ebooks_file);
                $this->ModelEbook->AddData($data);
                session()->setFlashdata('pesan', 'Data Buku Berhasil DiUpdate !');
                return redirect()->to(base_url('Ebook/AddData'));
            }else {
                //jika tidak lolos validasi
              session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
              return redirect()->to(base_url('Ebook/AddData/'))->withInput('validation', \Config\Services::validation());
            }
    }
    public function EditData($id_ebook)
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'ebook',
            'judul' => 'Edit Data',
            'page' => 'ebook/v_editdata',
            'kategori' => $this->ModelKategori->AllData(),
            'penulis' => $this->ModelPenulis->AllData(),
            'penerbit' => $this->ModelPenerbit->AllData(),
            'ebook' => $this->ModelEbook->DetailData($id_ebook),
        ];
        return view('v_template_admin', $data);
    }

    public function UpdateData($id_ebook)
    {
        if ($this->validate([

            'judul_ebook'=> [
                'label' =>'Judul E-Book',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong',
                ]
            ],
            'id_kategori'=> [
                'label' =>'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong',
                ]
            ],
            'id_penerbit'=> [
                'label' =>'Penerbit',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong',

                ]
            ],     
            'id_penulis'=> [
                'label' =>'Penulis',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ],        
            'tahun'=> [
                'label' =>'Tahun',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ],     
            'bahasa'=> [
                'label' =>'Bahasa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ],     
            'halaman'=> [
                'label' =>'Halaman',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ],     
           
            'cover' => [
                'label' => 'Cover Buku',
                'rules' => 'max_size[cover,2048]|mime_in[cover,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} Max  2048 Kb!',
                    'mime_in' => 'Format {field} Harus  JPG,PNG,JPEG !',
                ]   
            ],
            'ebooks' => [
                'label' => 'File Ebook',
                'rules' => 'max_size[ebooks,2048]|ext_in[ebooks,pdf]',
                'errors' => [
                    'max_size' => '{field} Max  2048 Kb!',
                    'ext_in' => 'Format {field} Harus .PDF !',
                ]   
            ],
            ])) {

                $cover = $this->request->getFile('cover');
                $ebook = $this->request->getFile('ebooks');

                if ($cover->getError() == 4 and $ebook->getError()== 4) {
                    $data = [
                        'id_ebook' => $id_ebook,
                        'judul_ebook'=>$this->request->getPost('judul_ebook'),
                        'isbn'=>$this->request->getPost('isbn'),
                        'id_kategori'=>$this->request->getPost('id_kategori'),
                        'id_penulis'=>$this->request->getPost('id_penulis'),
                        'id_penerbit'=>$this->request->getPost('id_penerbit'),
                        'tahun'=>$this->request->getPost('tahun'),
                        'bahasa'=>$this->request->getPost('bahasa'),
                        'halaman'=>$this->request->getPost('halaman'),
                    ];
                    $this->ModelEbook->EditData($data);

                }elseif ($ebook->getError()== 4) {
                    $nama_file = $cover->getRandomName();
                    $data = [
                    'id_ebook' => $id_ebook,
                        'judul_ebook'=>$this->request->getPost('judul_ebook'),
                        'isbn'=>$this->request->getPost('isbn'),
                        'id_kategori'=>$this->request->getPost('id_kategori'),
                        'id_penulis'=>$this->request->getPost('id_penulis'),
                        'id_penerbit'=>$this->request->getPost('id_penerbit'),
                        'tahun'=>$this->request->getPost('tahun'),
                        'bahasa'=>$this->request->getPost('bahasa'),
                        'halaman'=>$this->request->getPost('halaman'),
                        'cover' => $nama_file,
                        
                    ];
                    $cover->move('cover', $nama_file);
                    $this->ModelEbook->EditData($data);
                    
                } elseif ($cover->getError() == 4) {
                    $ebooks_file = $ebooks->getRandomName();
                    $data = [
                    'id_ebook' => $id_ebook,
                        'judul_ebook'=>$this->request->getPost('judul_ebook'),
                        'isbn'=>$this->request->getPost('isbn'),
                        'id_kategori'=>$this->request->getPost('id_kategori'),
                        'id_penulis'=>$this->request->getPost('id_penulis'),
                        'id_penerbit'=>$this->request->getPost('id_penerbit'),
                        'tahun'=>$this->request->getPost('tahun'),
                        'bahasa'=>$this->request->getPost('bahasa'),
                        'halaman'=>$this->request->getPost('halaman'),
                        'ebooks' => $ebooks_file,
                        
                    ];
                    $ebooks->move('ebooks', $ebooks_file);
                    $this->ModelEbook->EditData($data);
                    
                } else {
                    $ebooks_file = $ebook->getRandomName();
                    $nama_file = $cover->getRandomName();
                    $data = [
                        'id_ebook' => $id_ebook,
                        'judul_ebook'=>$this->request->getPost('judul_ebook'),
                        'isbn'=>$this->request->getPost('isbn'),
                        'id_kategori'=>$this->request->getPost('id_kategori'),
                        'id_penulis'=>$this->request->getPost('id_penulis'),
                        'id_penerbit'=>$this->request->getPost('id_penerbit'),
                        'tahun'=>$this->request->getPost('tahun'),
                        'bahasa'=>$this->request->getPost('bahasa'),
                        'halaman'=>$this->request->getPost('halaman'),
                        'cover' => $nama_file,
                        'ebooks' =>$ebooks_file,
                    ];
                    $cover->move('cover', $nama_file);
                    $ebook->move('ebooks', $ebooks_file);
                    $this->ModelEbook->EditData($data);
                }
             
                session()->setFlashdata('pesan', 'Data  Berhasil DiUpdate !');
                return redirect()->to(base_url('Ebook'));
            }else {
                //jika tidak lolos validasi
              session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
              return redirect()->to(base_url('Ebook/EditData/' . $id_ebook));
            }
    }
    public function DeleteData($id_ebook)
    {
        $data = ['id_ebook'=> $id_ebook];
        $this->ModelEbook->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to(base_url('Ebook'));
    }
}
