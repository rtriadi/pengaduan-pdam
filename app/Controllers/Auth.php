<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->authModel = new AuthModel();
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
            if ($user->level == 0) {
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

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
