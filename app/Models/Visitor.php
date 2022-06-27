<?php

namespace App\Models;

use CodeIgniter\Model;

class Visitor extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'visitors';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
}
