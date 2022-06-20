<?php

namespace App\Models;

use CodeIgniter\Model;

class Post extends Model
{
    protected $table            = 'post';
    protected $primaryKey       = 'post_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['parent_id', 'category_id', 'post_type', 'date_create', 'date_publish', 'date_modify', 'author', 'slug', 'image', 'title', 'content', 'description', 'kecamatan', 'status', 'others', 'sort'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'date_create';
    protected $updatedField  = 'date_modify';
}
