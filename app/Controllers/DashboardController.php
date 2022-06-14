<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data =
            [
                'title' => 'Dashboard',
                'uri' => 'dashboard'
            ];

        return view('admin/index', $data);
    }
}
