<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_sambung', 'nama_lengkap', 'jenis_kelamin', 'no_hp', 'alamat'];

    public function get($id_pelanggan = false)
    {
        if ($id_pelanggan == false) {
            return $this->findAll();
        }
        return $this->where(['id_pelanggan' => $id_pelanggan])->first();
    }

    public function edit($data)
    {
        return $this->db->table('pelanggan')
            ->set($data)
            ->where(['no_sambung' => $data['no_sambung']])
            ->update();
    }

    public function cekNoSambung($no_sambung)
    {
        return $this->db->table('pelanggan')->Where(['no_sambung' => $no_sambung])->get()->getResultArray();
    }
}
