<?php

namespace App\Models;

use CodeIgniter\Model;

class Administrators extends Model
{
    protected $table            = 'administrators';
    protected $primaryKey       = 'admin_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nik', 'nama', 'username', 'password', 'level', 'status'];

    public function getAdministrators()
    {
        $data = $this->findAll();
        return $data;
    }
}
