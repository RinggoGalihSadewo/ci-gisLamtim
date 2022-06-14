<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Guestbooks;
use App\Models\Post;

class SettingsController extends BaseController
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
            'title' => 'Settings',
            'uri' => 'settings',
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults()
        ];

        return view('admin/settings', $data);
    }
}
