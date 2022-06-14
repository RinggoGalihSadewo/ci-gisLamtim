<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Guestbooks;
use App\Models\Post;

class MapSettingsController extends BaseController
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
            'title' => 'Map Settings',
            'uri' => 'map-settings',
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults()
        ];

        return view('admin/map-settings', $data);
    }
}
