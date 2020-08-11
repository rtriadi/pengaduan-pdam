<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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

    public function importExcel()
    {

        $insert = 0;
        $update = 0;

        $validation =  \Config\Services::validation();

        $file = $this->request->getFile('fileexcel');

        $data = array(
            'fileexcel' => $file,
        );

        if ($validation->run($data, 'import') == FALSE) {

            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('pelanggan'));
        } else {

            // ambil extension dari file excel
            $extension = $file->getClientExtension();

            // format excel 2007 ke bawah
            if ('xls' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                // format excel 2010 ke atas
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($file);
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray();
            $flag = true;

            $i = 0;
            foreach ($allDataInSheet as $value) {

                // lewati baris ke 0 pada file excel
                // dalam kasus ini, array ke 0 adalahpara title
                if ($flag) {
                    $flag = false;
                    continue;
                }

                // get no_sambung from excel
                $inserdata[$i]['no_sambung'] = $value[0];
                $inserdata[$i]['nama_lengkap'] = $value[1];
                $inserdata[$i]['jenis_kelamin'] = $value[2];
                $inserdata[$i]['no_hp'] = $value[3];
                $inserdata[$i]['alamat'] = $value[4];
                $i++;
            }

            foreach ($inserdata as $dt) {
                $cek = $this->pelangganModel->cekNoSambung($dt['no_sambung']);
                /* dd(count($cek)); */
                if (count($cek) > 0) {
                    $data = [
                        "no_sambung" => $dt['no_sambung'],
                        "nama_lengkap" => $dt['nama_lengkap'],
                        "jenis_kelamin" => $dt['jenis_kelamin'],
                        "no_hp" => $dt['no_hp'],
                        "alamat" => $dt['alamat']
                    ];

                    $updates = $this->pelangganModel->edit($data);

                    if ($updates) {
                        $update++;
                    }
                } else {
                    $data = [
                        "no_sambung" => $dt['no_sambung'],
                        "nama_lengkap" => $dt['nama_lengkap'],
                        "jenis_kelamin" => $dt['jenis_kelamin'],
                        "no_hp" => $dt['no_hp'],
                        "alamat" => $dt['alamat']
                    ];

                    $inserts = $this->pelangganModel->insert($data);

                    if ($inserts) {
                        $insert++;
                    }
                }
            }
            session()->setFlashdata('pesan', 'Insert = ' . $insert . ' Update = ' . $update);
            return redirect()->to(base_url('pelanggan'));
        }
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
                'rules' => 'required|is_unique[pelanggan.no_sambung]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
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
                'rules' => "required|is_unique[pelanggan.no_sambung,id_pelanggan,$id_pelanggan]",
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
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
