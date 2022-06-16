<?php

namespace App\Models;

use CodeIgniter\Model;

class Popup extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'popup';
    protected $primaryKey       = 'popup_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['title', 'value', 'status'];
}
