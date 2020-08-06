<?php

namespace App\Models;

use CodeIgniter\Model;

class MeterPelangganModel extends Model
{
    protected $table = 'meter_pelanggan';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['tanggal_meter', 'meter', 'id_pelanggan'];

    public function get($id = false)
    {
        if ($id == false) {
            return $this->db->table('meter_pelanggan')->join('pelanggan', 'pelanggan.id_pelanggan = meter_pelanggan.id_pelanggan')
                ->get()
                ->getResultArray();
        }
        return $this->where(['id' => $id])->first();
    }
}
