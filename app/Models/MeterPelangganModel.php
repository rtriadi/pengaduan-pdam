<?php

namespace App\Models;

use CodeIgniter\Model;

class MeterPelangganModel extends Model
{
    protected $table = 'meter_pelanggan';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['bulan_meter', 'tahun_meter', 'meter', 'foto_meter', 'no_sambung', 'id_petugas'];

    public function get($id = false)
    {
        if ($id == false) {
            return $this->db->table('meter_pelanggan')->select('meter_pelanggan.*, pelanggan.nama_lengkap, petugas.nama_lengkap_petugas')->join('pelanggan', 'pelanggan.no_sambung = meter_pelanggan.no_sambung')->join('petugas', 'petugas.id_petugas = meter_pelanggan.id_petugas')
                ->get()
                ->getResultArray();
        }
        return $this->where(['id' => $id])->first();
    }

    public function edit($data)
    {
        return $this->db->table('meter_pelanggan')
            ->set($data)
            ->where(['bulan_meter' => $data['bulan_meter'], 'tahun_meter' => $data['tahun_meter'], 'no_sambung' => $data['no_sambung']])
            ->update();
    }

    public function cekNoSambung($bulan_meter, $tahun_meter, $no_sambung)
    {
        return $this->db->table('meter_pelanggan')->Where(['bulan_meter' => $bulan_meter, 'tahun_meter' => $tahun_meter, 'no_sambung' => $no_sambung])->get()->getResultArray();
    }
}
