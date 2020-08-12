<?php

namespace App\Controllers;

use App\Models\LaporanModel;

class Laporan extends BaseController
{
    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan',
        ];
        return view('laporan/data', $data);
    }

    public function laporan()
    {
        $tgl_a = $this->request->getGet('tanggal_awal');
        $tgl_z = $this->request->getGet('tanggal_akhir');
        $data = [
            'title' => 'Laporan',
            'row' => $this->laporanModel->getPengaduanByTanggal($tgl_a, $tgl_z)
        ];
        return view('laporan/laporan', $data);
    }
}
