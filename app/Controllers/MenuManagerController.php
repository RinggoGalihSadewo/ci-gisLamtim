<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MenuManagerController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Menu Manager',
            'uri' => 'menu-manager'
        ];

        return view('admin/menu-manager', $data);
    }
}
