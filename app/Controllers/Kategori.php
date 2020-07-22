<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Kategori',
            'validation' => \Config\Services::validation(),
            'kategori' => $this->kategoriModel->get()
        ];
        return view('kategori/data', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama_kategori' => [
                'rules' => 'required|is_unique[kategori.nama_kategori]',
                'errors' => [
                    'required' => 'nama bangunan harus diisi.',
                    'is_unique' => 'nama bangunan sudah terdaftar.'
                ]
            ]
        ])) {
            return redirect()->to('/kategori')->withInput();
        }

        $this->kategoriModel->save([
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/kategori');
    }

    public function update()
    {
        $id_kategori = $this->request->getVar('id_kategori');
        if (!$this->validate([
            'nama_kategori' => [
                'rules' => "required|is_unique[kategori.nama_kategori,id_kategori,$id_kategori]",
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ]
        ])) {
            return redirect()->to('/kategori')->withInput();
        }

        $this->kategoriModel->save([
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/kategori');
    }

    public function delete($id)
    {
        $this->kategoriModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/kategori');
    }
}
