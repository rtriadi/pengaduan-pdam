<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\MeterPelangganModel;
use App\Models\PelangganModel;
use App\Models\PengaduanModel;
use App\Models\PetugasModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->authModel = new AuthModel();
        $this->meterPelangganModel = new MeterPelangganModel();
        $this->pelangganModel = new PelangganModel();
        $this->pengaduanModel = new PengaduanModel();
        $this->petugasModel = new PetugasModel();
    }

    public function login()
    {
        if (session()->has('isLoggedIn')) {
            return redirect()->to(base_url('/home'));
        }
        if ($this->request->getPost()) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $user = $this->authModel->getUser($username);
            if ($user->level == 0 || $user->level == 1) {
                if ($user) {
                    if ($user->password !== sha1($password)) {
                        session()->setFlashdata('pesan', 'Password salah.');
                        return redirect()->to(base_url('/auth/login'));
                    } else {
                        $sessData = [
                            'id_petugas' => $user->id_petugas,
                            'username' => $user->username,
                            'level' => $user->level,
                            'nama_lengkap_petugas' => $user->nama_lengkap_petugas,
                            'isLoggedIn' => true
                        ];
                        session()->set($sessData);
                        return redirect()->to(base_url('home'));
                    }
                } else {
                    session()->setFlashdata('pesan', 'Username tidak terdaftar.');
                    return redirect()->to(base_url('/auth/login'));
                }
            } else {
                session()->setFlashdata('pesan', 'Anda bukan administrator.');
                return redirect()->to(base_url('/auth/login'));
            }
        } else {
            return view('login');
        }
    }

    public function qrcode()
    {
        return view('qrcode');
    }

    public function meter_pelanggan()
    {
        $data = [
            'title' => 'Form Meter Pelanggan'
        ];
        return view('formMeter', $data);
    }

    public function simpan()
    {
        $cek1 = $this->pelangganModel->cekNoSambung($this->request->getVar('no_sambung'));
        if ($cek1 == null) {
            echo '<script>alert("No Sambung tidak ditemukan.");</script>';
            echo '<script>window.location.href="' . base_url('/auth/meter_pelanggan') . '";</script>';
        } else {
            $cek2 = $this->meterPelangganModel->cekNoSambung($this->request->getVar('bulan_meter'), $this->request->getVar('tahun_meter'), $this->request->getVar('no_sambung'));
            if ($cek2 != null) {
                echo '<script>alert("Meter pelanggan untuk bulan dan tahun ini sudah ada.");</script>';
                echo '<script>window.location.href="' . base_url('/auth/meter_pelanggan') . '";</script>';
            } else {
                $cek3 = $this->petugasModel->get($this->request->getVar('id_petugas'));
                if ($cek3 == null) {
                    echo '<script>alert("Id Petugas tidak ditemukan.");</script>';
                    echo '<script>window.location.href="' . base_url('/auth/meter_pelanggan') . '";</script>';
                } else {
                    $fotoMeter = $this->request->getFile('foto_meter');
                    $namaFoto = $fotoMeter->getRandomName();
                    $fotoMeter->move('uploads/fotoMeter', $namaFoto);
                    $this->meterPelangganModel->save([
                        'bulan_meter' => $this->request->getVar('bulan_meter'),
                        'tahun_meter' => $this->request->getVar('tahun_meter'),
                        'meter' => $this->request->getVar('meter'),
                        'foto_meter' => $namaFoto,
                        'no_sambung' => $this->request->getVar('no_sambung'),
                        'id_petugas' => $this->request->getVar('id_petugas')
                    ]);
                    echo '<script>alert("Meter pelanggan telah berhasil ditambahkan.");</script>';
                    echo '<script>window.location.href="' . base_url('/auth/meter_pelanggan') . '";</script>';
                }
            }
        }
    }

    public function penyelesaian($id_pengaduan)
    {
        $data = [
            'title' => 'Form Penyelesaian',
            'pesan' => 'Pengaduan telah diselesaikan.',
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
            echo '<script>window.location.href="' . base_url('/auth/pesan') . '";</script>';
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
        return redirect()->to(base_url('/auth/login'));
    }
}
