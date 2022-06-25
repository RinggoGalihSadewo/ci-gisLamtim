<?php

namespace App\Models;

use CodeIgniter\Model;

class Menu extends Model
{
    protected $table            = 'menu';
    protected $primaryKey       = 'menu_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['menu_type', 'sort', 'title', 'url', 'target'];
}
