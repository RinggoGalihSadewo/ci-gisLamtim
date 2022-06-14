<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;
use App\Models\Guestbooks;

class TentangAplikasiController extends BaseController
{

    protected $post, $guestbooks;

    public function __construct()
    {
        $this->post = new Post();
        $this->guestbooks = new Guestbooks();
        helper(['form', 'url']);
    }

    public function index()
    {

        session();

        $data = [
            'title' => 'Tentang Aplikasi',
            'uri' => 'tentang-aplikasi',
            'post' => $this->post->where('post_type', 'profil')->findAll(),
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults()
        ];

        return view('admin/tentang-aplikasi', $data);
    }

    public function add()
    {

        $month = date('m');
        $day = date('d');
        $year = date('Y');
        $today = $year . '-' . $month . '-' . $day;

        $data = [
            'title' => 'Add New Tentang Aplikasi',
            'uri' => 'tentang-aplikasi',
            'today' => $today,
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults()
        ];

        return view('admin/tentang-aplikasi-add', $data);
    }

    public function save()
    {

        $slug = url_title($this->request->getVar('title'));

        $this->post->save([
            'parent_id' => 0,
            'category_id' => 0,
            'post_type' => 'profil',
            'date_create' => $this->request->getVar('date'),
            'date_publish' => $this->request->getVar('date'),
            'date_modify' => $this->request->getVar('date'),
            'author' => 'admin',
            'slug' => $slug,
            'title' => $this->request->getVar('title'),
            'content' => $this->request->getVar('content'),
            'description' => $this->request->getVar('desc'),
            'status' => $this->request->getVar('status'),
            'sort' => 1
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan !');

        return redirect()->to('/admin/tentang-aplikasi');
    }

    public function edit($post_id)
    {
        $data = [
            'title' => 'Edit Tentang Aplikasi',
            'uri' => 'tentang-aplikasi',
            'post' => $this->post->find($post_id),
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults()
        ];

        return view('admin/tentang-aplikasi-edit', $data);
    }

    public function editSave($post_id)
    {

        $slug = url_title($this->request->getVar('title'));


        $this->post->update($post_id, [
            'parent_id' => 0,
            'category_id' => 0,
            'post_type' => 'profil',
            'date_publish' => $this->request->getVar('date'),
            'date_modify' => $this->request->getVar('date'),
            'author' => 'admin',
            'slug' => $slug,
            'title' => $this->request->getVar('title'),
            'content' => $this->request->getVar('content'),
            'description' => $this->request->getVar('desc'),
            'status' => $this->request->getVar('status'),
            'sort' => 1
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diupdate !');
        return redirect()->to('/admin/tentang-aplikasi');
    }

    public function delete($post_id)
    {
        $this->post->delete($post_id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus !');

        return redirect()->to('admin/tentang-aplikasi');
    }
}
