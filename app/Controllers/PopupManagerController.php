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
            'imgAll' => $this->popup->findAll(),
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

    public function setActive()
    {
        $id = $this->request->getVar('id');
        $data = $this->popup->findAll();

        foreach ($data as $key) {
            if ($id === $key['popup_id']) {
                $this->popup->update($key['popup_id'], ['status' => 'active']);
            } else {
                $this->popup->update($key['popup_id'], ['status' => 'non_active']);
            }
        }

        session()->setFlashdata('pesan', 'Pop Up telah active !');

        return redirect()->to('admin/popup-manager');
    }

    public function saveEdit($popup_id)
    {
        $photo = $this->request->getFile('photo');
        $namaPhoto = $photo->getRandomName();
        $cekPhoto = $this->popup->find($popup_id);

        if (!$this->validate([
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'requierd' => 'Title wajib diisi !'
                ]
            ]
        ])) {
            session()->setFlashdata('pesan2', 'Isi semua data !');
            return redirect()->to('admin/popup-manager')->withInput();
        }

        if ($photo == '') {
            $namaPhoto = $cekPhoto['value'];
        } else {
            unlink('img/admin/popup/' . $cekPhoto['value']);
            $namaPhoto = $photo->getRandomName();
            $photo->move('img/admin/popup/', $namaPhoto);
        }

        $this->popup->update($popup_id, [
            'title' => $this->request->getVar('title'),
            'value' => $namaPhoto,
            'status' => 'non_active'
        ]);

        session()->setFlashdata('pesan', 'Pop Up berhasil diedit !');
        return redirect()->to('admin/popup-manager');
    }

    public function delete($popup_id)
    {
        $data = $this->popup->find($popup_id);
        $isActive = $data['status'];

        if ($isActive === "active") {
            $first = $this->popup->first();
            $this->popup->update($first['popup_id'], ['status' => 'active']);
        }

        unlink('img/admin/popup/' . $data['value']);
        $this->popup->delete($popup_id);
        session()->setFlashdata('pesan', 'Pop Up berhasil dihapus !');
        return redirect()->to('admin/popup-manager');
    }
}
