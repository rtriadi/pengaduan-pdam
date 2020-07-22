<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_kategori'];

    public function get($id_kategori = false)
    {
        if ($id_kategori == false) {
            return $this->findAll();
        }
        return $this->where(['id_kategori' => $id_kategori])->first();
    }
}
