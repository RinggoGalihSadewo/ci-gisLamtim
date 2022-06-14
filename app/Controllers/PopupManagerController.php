<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PopupManagerController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Popup Manager',
            'uri' => 'popup-manager'
        ];

        return view('admin/popup-manager', $data);
    }
}
