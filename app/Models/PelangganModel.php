<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'password', 'nama_lengkap', 'jenis_kelamin', 'no_hp', 'alamat'];

    public function get($id_pelanggan = false)
    {
        if ($id_pelanggan == false) {
            return $this->findAll();
        }
        return $this->where(['id_pelanggan' => $id_pelanggan])->first();
    }
}
