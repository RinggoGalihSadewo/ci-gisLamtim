<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Category;
use App\Models\Guestbooks;

class UserController extends BaseController
{

    protected $menu, $post, $category, $guestbooks;

    public function __construct()
    {
        $this->menu = new Menu();
        $this->post = new Post();
        $this->category = new Category();
        $this->guestbooks = new Guestbooks();

        session();
    }

    public function index()
    {
        $maps = $this->post->where('post_type', 'map')->findAll();

        $latLng = [];

        foreach ($maps as $map) {
            $data = json_decode($map['others'], true);
            isset($data['latitude']) ? array_push($latLng, [$data['latitude'], $data['longitude'], $map['title'], $map['image'], $map['slug'], $data['address']]) : '';
        }

        $data = [
            'title' => 'Peta Potensi Daerah Lampung Timur',
            'menu' => $this->menu->orderBy('sort', 'ASC')->findAll(),
            'maps' => $this->post->where('post_type', 'map')->findAll(),
            'latLng' => $latLng,
            'category' => $this->category->findAll(),
            'totalMap' => $this->post->where('post_type', 'map')->countAllResults(),
            'totalCategory' => $this->category->countAllResults()
        ];

        return view('user/index', $data);
    }

    public function tentangAplikasi()
    {
        $data = [
            'title' => 'Tentang Aplikasi',
            'menu' => $this->menu->orderBy('sort', 'ASC')->findAll(),
            'maps' => $this->post->where('post_type', 'map')->findAll(),
            'category' => $this->category->findAll(),
            'totalMap' => $this->post->where('post_type', 'map')->countAllResults(),
            'totalCategory' => $this->category->countAllResults(),
            'post' => $this->post->where('post_type', 'profil')->where('status', 'publish')->findAll(),
        ];

        return view('user/tentang-aplikasi', $data);
    }

    public function kontakKami()
    {
        $data = [
            'title' => 'Kontak Kami',
            'menu' => $this->menu->orderBy('sort', 'ASC')->findAll(),
            'maps' => $this->post->where('post_type', 'map')->findAll(),
            'category' => $this->category->findAll(),
            'totalMap' => $this->post->where('post_type', 'map')->countAllResults(),
            'totalCategory' => $this->category->countAllResults(),
            'post' => $this->post->where('post_type', 'profil')->where('status', 'publish')->findAll(),
        ];

        return view('user/kontak-kami', $data);
    }

    public function kontakKamiSave()
    {
        $this->guestbooks->save([
            'title' => $this->request->getVar('title'),
            'email' => $this->request->getVar('email'),
            'name' => $this->request->getVar('name'),
            'messages' => $this->request->getVar('messages'),
        ]);

        session()->setFlashdata('pesan', 'Berhasil mengirimkan pesan !');

        return redirect()->to('/kontak-kami');
    }

    public function peta()
    {

        $maps = $this->post->where('post_type', 'map')->findAll();

        $latLng = [];

        foreach ($maps as $map) {
            $data = json_decode($map['others'], true);
            isset($data['latitude']) ? array_push($latLng, [$data['latitude'], $data['longitude'], $map['title'], $map['image'], $map['slug'], $data['address']]) : '';
        }

        $place = $this->post
            ->select('category.title as category_title, post.post_id as post_id, post.title as title_post, post.slug as post_slug')
            ->join('category', 'post.category_id = category.category_id')
            ->where('post.post_type', 'map')
            ->orderBy('post_id', 'DESC')
            ->get()
            ->getResultArray();

        $data = [
            'title' => 'Peta',
            'menu' => $this->menu->orderBy('sort', 'ASC')->findAll(),
            'maps' => $this->post->where('post_type', 'map')->findAll(),
            'category' => $this->category->findAll(),
            'latLng' => $latLng,
            'places' => $place,
            'totalMap' => $this->post->where('post_type', 'map')->countAllResults(),
            'totalCategory' => $this->category->countAllResults(),
            'post' => $this->post->where('post_type', 'profil')->where('status', 'publish')->findAll(),
        ];

        return view('user/peta', $data);
    }

    public function detailPeta($slug)
    {

        $maps = $this->post->where('post_type', 'map')->where('slug', $slug)->first();
        $others = json_decode($maps['others']);

        $slider = $this->post->where('post_type', 'galeri')->where('parent_id', $maps['post_id'])->findAll();

        // dd($slider);

        $data = [
            'title' => 'Detail Peta',
            'menu' => $this->menu->orderBy('sort', 'ASC')->findAll(),
            'maps' => $maps,
            'slider' => $slider,
            'others' => $others,
            'category' => $this->category->findAll(),
            'totalMap' => $this->post->where('post_type', 'map')->countAllResults(),
            'totalCategory' => $this->category->countAllResults()
        ];

        return view('user/detail', $data);
    }
}
