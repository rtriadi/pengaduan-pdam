<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'password', 'level', 'nama_lengkap_petugas', 'jenis_kelamin_petugas', 'no_hp_petugas', 'alamat_petugas'];

    public function get($id_petugas = false)
    {
        if ($id_petugas == false) {
            return $this->findAll();
        }
        return $this->where(['id_petugas' => $id_petugas])->first();
    }
}
