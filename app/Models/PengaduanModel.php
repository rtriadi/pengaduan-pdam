<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_pelanggan', 'pengaduan', 'penyelesaian_pengaduan', 'id_petugas', 'status'];

    public function get()
    {
        return $this->db->table('pengaduan')
            ->select('pengaduan.*, pelanggan.no_sambung, pelanggan.nama_lengkap, pelanggan.alamat')
            ->join('pelanggan', 'pelanggan.id_pelanggan = pengaduan.id_pelanggan')
            ->get()
            ->getResultArray();
    }
}
