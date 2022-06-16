<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Guestbooks;
use App\Models\Post;
use App\Models\Popup;

class PopupManagerController extends BaseController
{

    protected $post, $guestbooks, $popup;

    public function __construct()
    {
        $this->post = new Post();
        $this->guestbooks = new Guestbooks();
        $this->popup = new Popup();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data = [
            'title' => 'Popup Manager',
            'uri' => 'popup-manager',
            'popup' => $this->popup->findAll(),
            'imgActive' => $this->popup->where('status', 'active')->findAll(),
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults()
        ];

        return view('admin/popup-manager', $data);
    }

    public function save()
    {

        $photo = $this->request->getFile('photo');
        $namaPhoto = $photo->getRandomName();
        $photo->move('img/admin/popup/', $namaPhoto);

        $this->popup->save([
            'title' => $this->request->getVar('title'),
            'value' => $namaPhoto,
            'status' => 'non_active'
        ]);

        session()->setFlashdata('pesan', 'Pop Up berhasil ditambahkan !');
        return redirect()->to('/admin/popup-manager');
    }

    public function editSave($popup_id)
    {
        dd($popup_id);
    }

    public function delete($popup_id)
    {
        $data = $this->popup->find($popup_id);
        unlink('img/admin/popup/' . $data['value']);
        $this->popup->delete($popup_id);
        session()->setFlashdata('pesan', 'Pop Up berhasil dihapus !');
        return redirect()->to('admin/popup-manager');
    }
}
