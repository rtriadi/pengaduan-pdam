<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\MeterPelangganModel;
use App\Models\PelangganModel;
use App\Models\PetugasModel;

class MeterPelanggan extends BaseController
{
    public function __construct()
    {
        $this->meterPelangganModel = new MeterPelangganModel();
        $this->pelangganModel = new PelangganModel();
        $this->petugasModel = new PetugasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Meter Pelanggan',
            'meter_pelanggan' => $this->meterPelangganModel->get()
        ];
        return view('meter_pelanggan/data', $data);
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
            return redirect()->to(base_url() . '/meterpelanggan');
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
                $inserdata[$i]['bulan_meter'] = $value[0];
                $inserdata[$i]['tahun_meter'] = $value[1];
                $inserdata[$i]['meter'] = $value[2];
                $inserdata[$i]['no_sambung'] = $value[3];
                $i++;
            }

            foreach ($inserdata as $dt) {
                $cek = $this->meterPelangganModel->cekNoSambung($dt['bulan_meter'], $dt['tahun_meter'], $dt['no_sambung']);
                if (count($cek) > 0) {
                    $data = [
                        "bulan_meter" => $dt['bulan_meter'],
                        "tahun_meter" => $dt['tahun_meter'],
                        "meter" => $dt['meter'],
                        "no_sambung" => $dt['no_sambung']
                    ];

                    $updates = $this->meterPelangganModel->edit($data);

                    if ($updates) {
                        $update++;
                    }
                } else {
                    $data = [
                        "bulan_meter" => $dt['bulan_meter'],
                        "tahun_meter" => $dt['tahun_meter'],
                        "meter" => $dt['meter'],
                        "no_sambung" => $dt['no_sambung']
                    ];

                    $inserts = $this->meterPelangganModel->insert($data);

                    if ($inserts) {
                        $insert++;
                    }
                }
            }
            session()->setFlashdata('pesan', 'Insert = ' . $insert . ' Update = ' . $update);
            return redirect()->to(base_url() . '/meterpelanggan');
        }
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data',
            'pelanggan' => $this->pelangganModel->get(),
            'petugas' => $this->petugasModel->get(),
            'validation' => \Config\Services::validation()
        ];
        return view('meter_pelanggan/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'bulan_meter' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'tahun_meter' => [
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
            'foto_meter' => [
                'rules' => 'uploaded[foto_meter]|max_size[foto_meter,1024]|is_image[foto_meter]|mime_in[foto_meter,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} belum dipilih.',
                    'max_size' => 'Ukuran gambar terlalu besar.',
                    'is_image' => 'Yang anda pilih bukan gambar.',
                    'mime_in' => 'Yang anda pilih bukan gambar.'
                ]
            ],
            'no_sambung' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'id_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ]
        ])) {
            return redirect()->to(base_url() . '/meterpelanggan/create')->withInput();
        }

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
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url() . '/meterpelanggan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Data',
            'meter_pelanggan' => $this->meterPelangganModel->get($id),
            'pelanggan' => $this->pelangganModel->get(),
            'petugas' => $this->petugasModel->get(),
            'validation' => \Config\Services::validation(),
        ];
        return view('meter_pelanggan/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        if (!$this->validate([
            'bulan_meter' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'tahun_meter' => [
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
            'foto_meter' => [
                'rules' => 'uploaded[foto_meter]|max_size[foto_meter,1024]|is_image[foto_meter]|mime_in[foto_meter,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} belum dipilih.',
                    'max_size' => 'Ukuran gambar terlalu besar.',
                    'is_image' => 'Yang anda pilih bukan gambar.',
                    'mime_in' => 'Yang anda pilih bukan gambar.'
                ]
            ],
            'no_sambung' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'id_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ]
        ])) {
            return redirect()->to(base_url() . '/meterpelanggan/edit/' . $id)->withInput();
        }

        $fotoMeter = $this->request->getFile('foto_meter');
        $namaFoto = $fotoMeter->getRandomName();
        $fotoMeter->move('uploads/fotoMeter', $namaFoto);
        unlink('uploads/fotoMeter/' . $this->request->getVar('fotoLama'));

        $this->meterPelangganModel->save([
            'id' => $id,
            'bulan_meter' => $this->request->getVar('bulan_meter'),
            'tahun_meter' => $this->request->getVar('tahun_meter'),
            'meter' => $this->request->getVar('meter'),
            'foto_meter' => $namaFoto,
            'no_sambung' => $this->request->getVar('no_sambung'),
            'id_petugas' => $this->request->getVar('id_petugas')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to(base_url() . '/meterpelanggan');
    }

    public function delete($id)
    {
        $row = $this->meterPelangganModel->find($id);
        unlink('uploads/fotoMeter/' . $row['foto_meter']);
        $this->meterPelangganModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(base_url() . '/meterpelanggan');
    }
}
