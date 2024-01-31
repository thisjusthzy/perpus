<?php

namespace App\Controllers;
use App\Models\ModelPengaturan;

class Home extends BaseController
{
    public function __construct()
    {
            helper('form');
            $this->ModelPengaturan = new ModelPengaturan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Home',
            'page' => 'v_home',
            'slider' => $this->ModelPengaturan->Slider(),
        ];
        return view('v_template', $data);
    }

    public function Sejarah()
    {
        $data = [
            'judul' => 'Sejarah',
            'page' => 'v_sejarah',
            'profile' => $this->ModelPengaturan->DetailWeb(),
        ];
        return view('v_template', $data);
    }

    public function VisiMisi()
    {
        $data = [
            'judul' => 'Visi & Misi',
            'page' => 'v_visi_misi',
            'profile' => $this->ModelPengaturan->DetailWeb(),
        ];
        return view('v_template', $data);
    }
    public function GalleryBuku()
    {
        $data = [
            'judul' => 'Gallery Buku',
            'page' => 'v_gallery_buku',
        ];
        return view('v_template', $data);
    }
}
