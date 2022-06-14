<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Guestbooks;

class DashboardController extends BaseController
{

    protected $guestbooks;

    public function __construct()
    {
        $this->guestbooks = new Guestbooks();
    }

    public function index()
    {
        $data =
            [
                'title' => 'Dashboard',
                'uri' => 'dashboard',
                'count' => $this->guestbooks->where('status', 'unread')->countAllResults()
            ];

        return view('admin/index', $data);
    }
}
