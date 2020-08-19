<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\PengaduanModel;
use App\Models\PetugasModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->authModel = new AuthModel();
        $this->pengaduanModel = new PengaduanModel();
        $this->petugasModel = new PetugasModel();
    }

    public function login()
    {
        if (session()->has('isLoggedIn')) {
            return redirect()->to('/home');
        }
        if ($this->request->getPost()) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $user = $this->authModel->getUser($username);
            if ($user->level == 0 || $user->level == 1) {
                if ($user) {
                    if ($user->password !== sha1($password)) {
                        session()->setFlashdata('pesan', 'Password salah.');
                        return redirect()->to('/auth/login');
                    } else {
                        $sessData = [
                            'id_petugas' => $user->id_petugas,
                            'username' => $user->username,
                            'level' => $user->level,
                            'nama_lengkap_petugas' => $user->nama_lengkap_petugas,
                            'isLoggedIn' => true
                        ];
                        session()->set($sessData);
                        return redirect()->to('/home');
                    }
                } else {
                    session()->setFlashdata('pesan', 'Username tidak terdaftar.');
                    return redirect()->to('/auth/login');
                }
            } else {
                session()->setFlashdata('pesan', 'Anda bukan administrator.');
                return redirect()->to('/auth/login');
            }
        } else {
            return view('login');
        }
    }

    public function penyelesaian($id_pengaduan)
    {
        $data = [
            'title' => 'Form Penyelesaian',
            'pesan' => 'Pengaduan telah diselesaikan oleh petugas lain.',
            'pengaduan' => $this->pengaduanModel->get($id_pengaduan)
        ];
        $cek = $this->pengaduanModel->get($id_pengaduan);
        if ($cek['status'] == 0) {
            return view('index', $data);
        } else {
            return view('pesan', $data);
        }
    }

    public function selesai()
    {
        $cek = $this->petugasModel->get($this->request->getVar('id_petugas'));
        if ($cek == null) {
            echo '<script>alert("Id Petugas tidak ditemukan.");</script>';
            echo '<script>window.location.href="' . base_url('/auth/penyelesaian/' . $this->request->getVar('id_pengaduan')) . '";</script>';
        } else {
            $this->pengaduanModel->save([
                'id_pengaduan' => $this->request->getVar('id_pengaduan'),
                'penyelesaian_pengaduan' => $this->request->getVar('penyelesaian_pengaduan'),
                'id_petugas' => $this->request->getVar('id_petugas'),
                'status' => 1
            ]);
            echo '<script>alert("Penyelesaian Pengaduan telah berhasil.");</script>';
            echo '<script>window.location.href="' . base_url('/auth/pesan/') . '";</script>';
        }
    }

    public function pesan()
    {
        $data = [
            'pesan' => 'Pengaduan telah diselesaikan.'
        ];
        return view('pesan', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
