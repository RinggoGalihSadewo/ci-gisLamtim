<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Guestbooks;
use App\Models\Post;
use App\Models\Menu;

class MenuManagerController extends BaseController
{
    protected $post, $menu, $guestbooks;

    public function __construct()
    {
        $this->post = new Post();
        $this->guestbooks = new Guestbooks();
        $this->menu = new Menu();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data = [
            'title' => 'Menu Manager',
            'uri' => 'menu-manager',
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults(),
            'menu' => $this->menu->orderBy('sort', 'ASC')->get()->getResultArray()
        ];

        return view('admin/menu-manager', $data);
    }

    public function save()
    {

        $valueSort = $this->menu->orderBy('sort', 'DESC')->first();
        $sort = $valueSort['sort'] + 1;

        $this->menu->save([
            'menu_type' => 'main-menu',
            'title' => $this->request->getVar('title'),
            'sort' => $sort,
            'url' => $this->request->getVar('url'),
            'target' => $this->request->getVar('target')
        ]);

        session()->setFlashdata('pesan', 'Menu berhasil ditambahkan !');

        return redirect()->to('/admin/menu-manager');
    }

    public function sort()
    {
        $json = json_decode($this->request->getVar('json'), true);
        $sort = array();

        foreach ($json as $key => $value) {
            array_push($sort, array('id' => $value['id'], 'sort' => $key));
        }

        foreach ($sort as $key) {
            $this->menu->update(
                $key['id'],
                [
                    'sort' => $key['sort']
                ]
            );
        }

        session()->setFlashdata('pesan', 'Berhasil mengubah struktur menu !');
        return redirect()->to('admin/menu-manager');
    }

    public function edit($menu_id)
    {
        $data = [
            'title' => 'Edit Menu Manager',
            'uri' => 'menu-manager',
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults(),
            'menu' => $this->menu->find($menu_id),
            'menus' => $this->menu->orderBy('sort', 'ASC')->get()->getResultArray()
        ];

        return view('admin/menu-manager-edit', $data);
    }

    public function editSave($menu_id)
    {

        $this->menu->update($menu_id, [
            'title' => $this->request->getVar('title'),
            'url' => $this->request->getVar('url'),
            'target' => $this->request->getVar('target')
        ]);

        session()->setFlashdata('pesan', 'Menu berhasil diedit !');
        return redirect()->to('admin/menu-manager');
    }

    public function delete($menu_id)
    {
        $this->menu->delete($menu_id);

        session()->setFlashdata('pesan', 'Berhasil menghapus menu!');
        return redirect()->to('admin/menu-manager');
    }
}
