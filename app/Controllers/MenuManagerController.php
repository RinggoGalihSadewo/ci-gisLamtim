<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Guestbooks;
use App\Models\Post;

class MenuManagerController extends BaseController
{
    protected $post, $guestbooks;

    public function __construct()
    {
        $this->post = new Post();
        $this->guestbooks = new Guestbooks();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data = [
            'title' => 'Menu Manager',
            'uri' => 'menu-manager',
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults()
        ];

        return view('admin/menu-manager', $data);
    }
}
