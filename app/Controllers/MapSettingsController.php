<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Guestbooks;
use App\Models\Post;
use App\Models\Category;

class MapSettingsController extends BaseController
{

    protected $post, $guestbooks, $category;

    public function __construct()
    {
        $this->post = new Post();
        $this->category = new Category();
        $this->guestbooks = new Guestbooks();
        helper(['form', 'url']);
        session();
    }

    public function index()
    {
        $post = $this->post
            ->select('post.post_id, post.date_publish, post.status, post.slug, post.title, post.kecamatan, post.author, category.title as category')
            ->join('category', 'post.category_id = category.category_id')
            ->where('post.post_type', 'map')
            ->orderBy('post_id', 'DESC')
            ->get()
            ->getResultArray();

        $data = [
            'title' => 'Map Settings',
            'uri' => 'map-settings',
            'post' => $post,
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults(),
        ];

        return view('admin/map-settings', $data);
    }

    public function add()
    {
        $month = date('m');
        $day = date('d');
        $year = date('Y');
        $today = $year . '-' . $month . '-' . $day;

        $jsonKec = '[{"id":"180701","nama":"Sukadana"},{"id":"180702","nama":"Labuhan Maringgai"},{"id":"180703","nama":"Jabung"},{"id":"180704","nama":"Pekalongan"},{"id":"180705","nama":"Sekampung"},{"id":"180706","nama":"Batanghari"},{"id":"180707","nama":"Way Jepara"},{"id":"180708","nama":"Purbolinggo"},{"id":"180709","nama":"Raman Utara"},{"id":"180710","nama":"Metro Kibang"},{"id":"180711","nama":"Marga Tiga"},{"id":"180712","nama":"Sekampung Udik"},{"id":"180713","nama":"Batanghari Nuban"},{"id":"180714","nama":"Bumi Agung"},{"id":"180715","nama":"Bandar Sribhawono"},{"id":"180716","nama":"Mataram Baru"},{"id":"180717","nama":"Melinting"},{"id":"180718","nama":"Gunung Pelindung"},{"id":"180719","nama":"Pasir Sakti"},{"id":"180720","nama":"Waway Karya"},{"id":"180721","nama":"Labuhan Ratu"},{"id":"180722","nama":"Braja Selebah"},{"id":"180723","nama":"Way Bungur"},{"id":"180724","nama":"Marga Sekampung"}]';

        $kec = json_decode($jsonKec);

        $data = [
            'title' => 'Map Settings',
            'uri' => 'map-settings',
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults(),
            'today' => $today,
            'kec' => $kec,
            'category' => $this->category->findAll(),
        ];

        return view('admin/map-settings-add', $data);
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
            return redirect()->to('admin/map-settings/add')->withInput();
        }

        $except = ['csrf_test_name', 'title', 'status', 'category', 'date', 'kec', 'status'];
        $data = $this->request->getVar();
        $image = $this->request->getFile('cover');
        $cover = $image->getRandomName();

        $image->move('img/admin/map/cover', $cover);

        foreach ($data as $key => $val) {
            foreach ($except as $exc) {
                if ($key == $exc) unset($data[$key]);
            }
        }

        $encoded = json_encode($data);

        $this->post->save([
            'date_create' => $this->request->getVar('date'),
            'date_publish' => $this->request->getVar('date'),
            'date_modify' => $this->request->getVar('date'),
            'category_id' => $this->request->getVar('category'),
            'post_type' => 'map',
            'author' => 'admin',
            'image' => $cover,
            'slug' => url_title($this->request->getVar('title')),
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('desc'),
            'kecamatan' => $this->request->getVar('kec'),
            'others' => $encoded,
            'status' => $this->request->getVar('status'),
            'sort' => 1
        ]);

        session()->setFlashdata('pesan', 'Map berhasil ditambhkan !');
        return redirect()->to('admin/map-settings');
    }

    public function edit($post_id)
    {
        $post = $this->post->find($post_id);

        $jsonKec = '[{"id":"180701","nama":"Sukadana"},{"id":"180702","nama":"Labuhan Maringgai"},{"id":"180703","nama":"Jabung"},{"id":"180704","nama":"Pekalongan"},{"id":"180705","nama":"Sekampung"},{"id":"180706","nama":"Batanghari"},{"id":"180707","nama":"Way Jepara"},{"id":"180708","nama":"Purbolinggo"},{"id":"180709","nama":"Raman Utara"},{"id":"180710","nama":"Metro Kibang"},{"id":"180711","nama":"Marga Tiga"},{"id":"180712","nama":"Sekampung Udik"},{"id":"180713","nama":"Batanghari Nuban"},{"id":"180714","nama":"Bumi Agung"},{"id":"180715","nama":"Bandar Sribhawono"},{"id":"180716","nama":"Mataram Baru"},{"id":"180717","nama":"Melinting"},{"id":"180718","nama":"Gunung Pelindung"},{"id":"180719","nama":"Pasir Sakti"},{"id":"180720","nama":"Waway Karya"},{"id":"180721","nama":"Labuhan Ratu"},{"id":"180722","nama":"Braja Selebah"},{"id":"180723","nama":"Way Bungur"},{"id":"180724","nama":"Marga Sekampung"}]';

        $kec = json_decode($jsonKec);

        $data = [
            'title' => 'Edit Map Settings',
            'uri' => 'map-settings',
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults(),
            'post' => $post,
            'kec' => $kec,
            'others' => json_decode($post['others']),
            'category' => $this->category->find($post['category_id']),
            'categorys' => $this->category->findAll()
        ];

        return view('admin/map-settings-edit', $data);
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
            return redirect()->to('admin/map-settings/edit/' . $post_id)->withInput();
        }

        $photo = $this->request->getFile('cover');
        $cekPhoto = $this->post->find($post_id);

        if ($photo == '') {
            $namaPhoto = $cekPhoto['image'];
        } else {
            unlink('img/admin/map/cover/' . $cekPhoto['image']);
            $namaPhoto = $photo->getRandomName();
            $photo->move('img/admin/map/cover/', $namaPhoto);
        }

        $except = ['csrf_test_name', 'title', 'status', 'category', 'date', 'kec', 'status'];
        $data = $this->request->getVar();

        foreach ($data as $key => $val) {
            foreach ($except as $exc) {
                if ($key == $exc) unset($data[$key]);
            }
        }

        $encoded = json_encode($data);

        $this->post->update($post_id, [
            'date_create' => $this->request->getVar('date'),
            'date_publish' => $this->request->getVar('date'),
            'date_modify' => $this->request->getVar('date'),
            'category_id' => $this->request->getVar('category'),
            'image' => $namaPhoto,
            'slug' => url_title($this->request->getVar('title')),
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('desc'),
            'kecamatan' => $this->request->getVar('kec'),
            'others' => $encoded,
            'status' => $this->request->getVar('status'),
        ]);

        session()->setFlashdata('pesan', 'Map berhasil diedit !');
        return redirect()->to('admin/map-settings');
    }

    public function galeri($post_id)
    {

        $data = [
            'title' => 'Galeri Map Settings',
            'uri' => 'map-settings',
            'post' => $this->post->find($post_id),
            'galeri' => $this->post->where('parent_id', $post_id)->findAll(),
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults(),
        ];

        return view('admin/map-settings-galeri', $data);
    }

    public function uploadGaleri($post_id)
    {
        $data = [
            'title' => 'Upload Galeri Map Settings',
            'uri' => 'map-settings',
            'post' => $this->post->find($post_id),
            'galeri' => $this->post->where('parent_id', $post_id)->findAll(),
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults(),
        ];

        return view('admin/map-settings-galeri-upload', $data);
    }

    public function saveGaleri($post_id)
    {
        $image = $this->request->getFile('file');

        $imageName = $image->getRandomName();

        $image->move('img/admin/map/galeri/', $imageName);

        $data = [
            'parent_id' => $post_id,
            'post_type' => 'galeri',
            'image' => $imageName,
            'sort' => 1
        ];

        $this->post->save($data);

        return json_encode(array(
            'status' => 1,
            'image' => $imageName
        ));

        session()->setFlashdata('pesan', 'Berhasil mengupload galeri !');
        return redirect()->back();
    }

    public function deleteGaleri($post_id)
    {

        $galeri = $this->post->find($post_id);

        $this->post->delete($post_id);
        unlink('img/admin/map/galeri/' . $galeri['image']);

        session()->setFlashdata('pesan', 'Galeri berhasil dihapus ');
        return redirect()->back();
    }

    public function delete($post_id)
    {
        $data = $this->post->find($post_id);
        unlink('img/admin/map/cover/' . $data['image']);
        $this->post->delete($post_id);

        session()->setFlashdata('pesan', 'Map berhasil dihapus !');
        return redirect()->to('admin/map-settings');
    }
}
