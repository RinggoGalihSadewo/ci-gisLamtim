<?php

namespace App\Models;

use CodeIgniter\Model;

class Settings extends Model
{
    protected $table            = 'settings';
    protected $primaryKey       = 'setting_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['value'];
}
