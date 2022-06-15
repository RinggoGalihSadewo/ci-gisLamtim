<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'category';
    protected $primaryKey       = 'category_id';
    protected $allowedFields    = ['post_type', 'image', 'slug', 'title', 'description', 'sort'];
}
