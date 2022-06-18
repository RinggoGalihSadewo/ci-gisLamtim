<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Guestbooks;
use App\Models\Post;
use App\Models\Category;
use PDO;

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

        $data = [
            'title' => 'Map Settings',
            'uri' => 'map-settings',
            'count' => $this->guestbooks->where('status', 'unread')->countAllResults(),
            'today' => $today,
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
        $image = $this->request->getFile('cover')->getRandomName();

        foreach ($data as $key => $val) {
            foreach ($except as $exc) {
                if ($key == $exc) unset($data[$key]);
            }
        }

        $encoded = json_encode($data);

        $this->post->save([
            'date_create' => $this->request->getVar('date'),
            'date_create' => $this->request->getVar('date'),
            'date_modify' => $this->request->getVar('date'),
            'category_id' => $this->request->getVar('category'),
            'post_type' => 'map',
            'author' => 'admin',
            'image' => $image,
            'slug' => url_title($this->request->getVar('title')),
            'title' => url_title($this->request->getVar('title')),
            'description' => $this->request->getVar('desc'),
            'kecamatan' => $this->request->getVar('kec'),
            'others' => $encoded,
            'status' => $this->request->getVar('status'),
            'sort' => 1
        ]);

        session()->setFlashdata('pesan', 'Map berhasil ditambhkan !');
        return redirect()->to('admin/map-settings');
    }
}
