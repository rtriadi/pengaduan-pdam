<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';

    public function getPengaduanByTanggal($tgl_a, $tgl_z)
    {
        return $this->query("SELECT * FROM pengaduan WHERE tanggal_pengaduan BETWEEN '$tgl_a%' AND '$tgl_z%' AND status = 1")->getResult();
    }
}
