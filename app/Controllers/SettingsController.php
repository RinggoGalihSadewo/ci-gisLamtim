<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Guestbooks;
use App\Models\Post;
use App\Models\Settings;

class SettingsController extends BaseController
{
    protected $post, $guestbooks, $settings;

    public function __construct()
    {
        $this->post = new Post();
        $this->guestbooks = new Guestbooks();
        $this->settings = new Settings();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data = [
            'title' => 'Settings',
            'uri' => 'settings',
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults(),
            'settings' => $this->settings->findAll()
        ];

        return view('admin/settings', $data);
    }

    public function saveEdit($setting_id)
    {

        $data = $this->settings->find($setting_id);
        $keyword = $data['keyword'];


        if (!$this->validate([
            "$keyword" => [
                'rules' => 'required',
                'error' => [
                    'required' => '{field} wajib diisi !'
                ]
            ]
        ])) {
            session()->setFlashdata('pesan2', "$keyword tidak boleh kosong");
            return redirect()->to('admin/settings')->withInput();
        }

        $this->settings->update($setting_id, [
            'value' => $this->request->getVar($keyword)
        ]);

        session()->setFlashdata('pesan', "$keyword berhasil diubah !");

        return redirect()->to('admin/settings');
    }
}
