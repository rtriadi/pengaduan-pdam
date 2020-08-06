<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'password', 'level'];
    protected $returnType    = 'App\Entities\Auth';

    public function getUser($username)
    {
        return $this->where(['username' => $username])->first();
    }
}
