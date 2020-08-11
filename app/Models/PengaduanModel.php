<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_sambung', 'nama', 'alamat', 'pengaduan', 'penyelesaian_pengaduan', 'id_petugas', 'status'];

    public function get()
    {
        return $this->findAll();
    }
}
