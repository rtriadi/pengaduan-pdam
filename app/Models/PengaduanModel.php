<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_sambung', 'nama', 'alamat', 'pengaduan', 'penyelesaian_pengaduan', 'id_petugas', 'status'];

    public function get($id_pengaduan = null)
    {
        if ($id_pengaduan == false) {
            return $this->db->table('pengaduan')->select('pengaduan.*, petugas.nama_lengkap_petugas')->join('petugas', 'petugas.id_petugas = pengaduan.id_petugas')
                ->get()
                ->getResultArray();
        }
        return $this->where(['id_pengaduan' => $id_pengaduan])->first();
    }
}
