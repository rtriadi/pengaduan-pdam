<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pelanggan',
            'pelanggan' => $this->pelangganModel->get()
        ];
        return view('pelanggan/data', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data',
            'validation' => \Config\Services::validation()
        ];
        return view('pelanggan/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'no_sambung' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ]
        ])) {
            return redirect()->to('/pelanggan/create')->withInput();
        }

        $this->pelangganModel->save([
            'no_sambung' => $this->request->getVar('no_sambung'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/pelanggan');
    }

    public function edit($id_pelanggan)
    {
        $data = [
            'title' => 'Form Ubah Data',
            'validation' => \Config\Services::validation(),
            'pelanggan' => $this->pelangganModel->get($id_pelanggan)
        ];
        return view('pelanggan/edit', $data);
    }

    public function update()
    {
        $id_pelanggan = $this->request->getVar('id_pelanggan');
        if (!$this->validate([
            'no_sambung' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ]
        ])) {
            return redirect()->to('/pelanggan/edit/' . $id_pelanggan)->withInput();
        }

        $this->pelangganModel->save([
            'id_pelanggan' => $id_pelanggan,
            'no_sambung' => $this->request->getVar('no_sambung'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/pelanggan');
    }

    public function delete($id)
    {
        $this->pelangganModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/pelanggan');
    }
}
