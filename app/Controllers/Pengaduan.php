<?php

namespace App\Controllers;

use App\Models\PengaduanModel;

class Pengaduan extends BaseController
{
    public function __construct()
    {
        $this->pengaduanModel = new PengaduanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pengaduan',
            'pengaduan' => $this->pengaduanModel->get()
        ];
        return view('pengaduan/data', $data);
    }
}
