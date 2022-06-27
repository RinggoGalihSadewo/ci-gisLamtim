<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Guestbooks;
use App\Models\Visitor;

class DashboardController extends BaseController
{

    protected $guestbooks, $visitor;

    public function __construct()
    {
        $this->guestbooks = new Guestbooks();
        $this->visitor = new Visitor();
    }

    public function index()
    {
        $total = $this->visitor->countALL();
        $bulan = $this->visitor->where('YEAR(date_time)', date('Y'))->where('MONTH(date_time)', date('m'))->countAllResults();
        $minggu = $this->visitor->where('YEARWEEK(`date_time`,1) = YEARWEEK(CURDATE(),1)')->countAllResults();
        $hari = $this->visitor->where('YEAR(date_time)', date('Y'))->where('MONTH(date_time)', date('m'))->where('DAY(date_time)', date('d'))->countAllResults();

        $data = [
            'title' => 'Dashboard',
            'uri' => 'dashboard',
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults(),
            'totalVisitor' => $total,
            'bulanVisitor' => $bulan,
            'mingguVisitor' => $minggu,
            'hariVisitor' => $hari
        ];

        return view('admin/index', $data);
    }
}
