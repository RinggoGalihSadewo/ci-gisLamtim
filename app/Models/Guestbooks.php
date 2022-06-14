<?php

namespace App\Models;

use CodeIgniter\Model;

class Guestbooks extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'guestbooks';
    protected $primaryKey       = 'guestbook_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['name', 'email', 'phone', 'title', 'message', 'status'];

    // Dates
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'date_create';
}
