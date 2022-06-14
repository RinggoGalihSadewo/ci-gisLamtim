<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MapSettingsController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Map Settings',
            'uri' => 'map-settings'
        ];

        return view('admin/map-settings', $data);
    }
}
