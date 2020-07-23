<?php

namespace App\Controllers;

use App\Models\PetugasModel;

class Petugas extends BaseController
{
    public function __construct()
    {
        $this->petugasModel = new PetugasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Petugas',
            'petugas' => $this->petugasModel->get()
        ];
        return view('petugas/data', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data',
            'validation' => \Config\Services::validation()
        ];
        return view('petugas/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'username_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'password_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'nama_lengkap_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'jenis_kelamin_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'no_hp_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'alamat_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ]
        ])) {
            return redirect()->to('/petugas/create')->withInput();
        }

        $this->petugasModel->save([
            'username_petugas' => $this->request->getVar('username_petugas'),
            'password_petugas' => sha1($this->request->getVar('password_petugas')),
            'level' => $this->request->getVar('level'),
            'nama_lengkap_petugas' => $this->request->getVar('nama_lengkap_petugas'),
            'jenis_kelamin_petugas' => $this->request->getVar('jenis_kelamin_petugas'),
            'no_hp_petugas' => $this->request->getVar('no_hp_petugas'),
            'alamat_petugas' => $this->request->getVar('alamat_petugas')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/petugas');
    }

    public function edit($id_petugas)
    {
        $data = [
            'title' => 'Form Ubah Data',
            'validation' => \Config\Services::validation(),
            'petugas' => $this->petugasModel->get($id_petugas)
        ];
        return view('petugas/edit', $data);
    }

    public function update()
    {
        $id_petugas = $this->request->getVar('id_petugas');
        if (!$this->validate([
            'username_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'password_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'nama_lengkap_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'jenis_kelamin_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'no_hp_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'alamat_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ]
        ])) {
            return redirect()->to('/petugas/edit/' . $id_petugas)->withInput();
        }

        $this->petugasModel->save([
            'id_petugas' => $id_petugas,
            'username_petugas' => $this->request->getVar('username_petugas'),
            'password_petugas' => sha1($this->request->getVar('password_petugas')),
            'level' => $this->request->getVar('level'),
            'nama_lengkap_petugas' => $this->request->getVar('nama_lengkap_petugas'),
            'jenis_kelamin_petugas' => $this->request->getVar('jenis_kelamin_petugas'),
            'no_hp_petugas' => $this->request->getVar('no_hp_petugas'),
            'alamat_petugas' => $this->request->getVar('alamat_petugas')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/petugas');
    }

    public function delete($id)
    {
        $this->petugasModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/petugas');
    }
}
