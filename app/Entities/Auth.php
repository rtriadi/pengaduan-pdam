<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Auth extends Entity
{
    public function setPassword(string $password)
    {
        return $this->attributes['password'] = sha1($password);
    }
}
