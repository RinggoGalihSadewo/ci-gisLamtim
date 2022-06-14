<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SettingsController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Settings',
            'uri' => 'settings'
        ];

        return view('admin/settings', $data);
    }
}
