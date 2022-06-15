<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Guestbooks;

class CategoryController extends BaseController
{

    protected $category, $guestbooks;

    public function __construct()
    {
        $this->category = new Category();
        $this->guestbooks = new Guestbooks();
        helper(['form', 'url']);
        session();
    }

    public function index()
    {
        $data = [
            'title' => 'Category',
            'uri' => 'map-settings',
            'category' => $this->category->where('post_type', 'map')->findAll(),
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults()
        ];

        return view('admin/category', $data);
    }

    public function add()
    {

        $data = [
            'title' => 'Add Category',
            'uri' => 'map-settings',
            'category' => $this->category->findAll(),
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults()
        ];

        return view('admin/category-add', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Title wajib diisi !'
                ]
            ]
        ])) {
            return redirect()->to('admin/map-settings/category/add')->withInput();
        }

        $photo = $this->request->getFile('photo');

        if ($photo->getError() == 4) {
            $namaPhoto = 'default-image.jpg';
        } else {
            $namaPhoto = $photo->getRandomName();
            $photo->move('img/admin/category/', $namaPhoto);
        }
        $this->category->save([
            'post_type' => 'map',
            'image' => $namaPhoto,
            'slug' => url_title($this->request->getVar('title')),
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('desc'),
            'sort' => 1
        ]);

        session()->setFlashdata('pesan', 'Category berhasil ditambahkan !');

        return redirect()->to('/admin/map-settings/category');
    }

    public function edit($post_id)
    {
        $data = [
            'title' => 'Edit Category',
            'uri' => 'map-settings',
            'category' => $this->category->findAll(),
            'categoryEdit' => $this->category->find($post_id),
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults()
        ];

        return view('admin/category-edit', $data);
    }

    public function editSave($post_id)
    {
        if (!$this->validate([
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Title wajib diisi !'
                ]
            ]
        ])) {
            return redirect()->to('/admin/map-settings/category/edit/' . $post_id)->withInput();
        };

        $photo = $this->request->getFile('photo');
        $cekPhoto = $this->category->find($post_id);

        if ($photo == '') {
            $namaPhoto = $cekPhoto['image'];
        } else {
            unlink('img/admin/category/' . $cekPhoto['image']);
            $namaPhoto = $photo->getRandomName();
            $photo->move('img/admin/category/', $namaPhoto);
        }

        $this->category->update($post_id, [
            'image' => $namaPhoto,
            'slug' => url_title($this->request->getVar('title')),
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('desc'),
        ]);

        session()->setFlashdata('pesan', 'Category berhasil diedit !');
        return redirect()->to('/admin/map-settings/category');
    }

    public function delete($post_id)
    {
        $category = $this->category->find($post_id);

        if ($category['image'] != 'default-image.jpg') {
            unlink('img/admin/category/' . $category['image']);
        }

        $this->category->delete($post_id);
        session()->setFlashdata('pesan', 'Category berhasil dihapus !');
        return redirect()->to('admin/map-settings/category');
    }
}
