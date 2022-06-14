<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Guestbooks;

class GuestbooksController extends BaseController
{

    protected $guestbooks;

    public function __construct()
    {
        $this->guestbooks = new Guestbooks();
    }

    public function index()
    {
        $data = [
            'title' => 'Guestbooks',
            'uri' => 'guestbooks',
            'guestbooks' => $this->guestbooks->findAll(),
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults()
        ];

        return view('admin/guestbooks', $data);
    }

    public function read($guestbook_id)
    {

        $this->guestbooks->update($guestbook_id, [
            'status' => 'read'
        ]);

        $data = [
            'title' => 'Read Guestbooks',
            'uri' => 'guestbooks',
            'guestbooks' => $this->guestbooks->find($guestbook_id),
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults()
        ];

        return view('admin/guestbooks-read', $data);
    }

    public function delete($guestbook_id)
    {
        $this->guestbooks->delete($guestbook_id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus!');

        return redirect()->to('/admin/guestbooks');
    }
}
