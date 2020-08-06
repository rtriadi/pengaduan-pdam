<?php

namespace App\Controllers;

use App\Models\MeterPelangganModel;
use App\Models\PelangganModel;

class MeterPelanggan extends BaseController
{
    public function __construct()
    {
        $this->meterPelangganModel = new MeterPelangganModel();
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Meter Pelanggan',
            'meter_pelanggan' => $this->meterPelangganModel->get()
        ];
        return view('meter_pelanggan/data', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data',
            'pelanggan' => $this->pelangganModel->get(),
            'validation' => \Config\Services::validation()
        ];
        return view('meter_pelanggan/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'tanggal_meter' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'meter' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'id_pelanggan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ]
        ])) {
            return redirect()->to('/meterpelanggan/create')->withInput();
        }

        $this->meterPelangganModel->save([
            'tanggal_meter' => $this->request->getVar('tanggal_meter'),
            'meter' => $this->request->getVar('meter'),
            'id_pelanggan' => $this->request->getVar('id_pelanggan')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/meterpelanggan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Data',
            'meter_pelanggan' => $this->meterPelangganModel->get($id),
            'pelanggan' => $this->pelangganModel->get(),
            'validation' => \Config\Services::validation(),
        ];
        return view('meter_pelanggan/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getVar('id_pelanggan');
        if (!$this->validate([
            'tanggal_meter' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'meter' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'id_pelanggan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ]
        ])) {
            return redirect()->to('/meterpelanggan/edit/' . $id)->withInput();
        }

        $this->meterPelangganModel->save([
            'id' => $id,
            'tanggal_meter' => $this->request->getVar('tanggal_meter'),
            'meter' => $this->request->getVar('meter'),
            'id_pelanggan' => $this->request->getVar('id_pelanggan')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/meterpelanggan');
    }

    public function delete($id)
    {
        $this->meterPelangganModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/meterpelanggan');
    }
}
