<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Administrators;

class AdministratorController extends BaseController
{

    protected $administrator;

    public function __construct()
    {
        $this->administrator = new Administrators();
        helper(['form', 'url']);
    }

    public function index()
    {

        $data = [
            'title' => 'Administrator',
            'uri' => 'administrator',
            'administrator' => $this->administrator->getAdministrators()
        ];

        return view('admin/administrator', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add New Administrator',
            'uri' => 'administrator'
        ];

        return view('admin/administrator-add', $data);
    }

    public function save()
    {
        if ($this->request->getVar('password') !== $this->request->getVar('confirmPassword')) {
            session()->setFlashdata('pesan', 'Password dan Confirm Password tidak sama !');
            return redirect()->to('/admin/administrator/add')->withInput();
        }

        $this->administrator->save([
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'level' => 'admin',
            'status' => 'active'
        ]);

        session()->setFlashdata('pesan', 'Data Administrator berhasil ditambahkan !');
        return redirect()->to('/admin/administrator');
    }

    public function edit($admin_id)
    {
        $data = [
            'title' => 'Edit Administrator',
            'uri' => 'administrator',
            'administrator' => $this->administrator->find($admin_id)
        ];

        return view('admin/administrator-edit', $data);
    }

    public function editSave($admin_id)
    {
        if ($this->request->getVar('password') !== $this->request->getVar('confirmPassword')) {
            session()->setFlashdata('pesan', 'Password dan Confirm Password tidak sama !');
            return redirect()->to('/admin/administrator/edit/' . $admin_id);
        }

        $this->administrator->update(
            $admin_id,
            [
                'nik' => $this->request->getVar('nik'),
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'level' => 'admin',
                'status' => 'active'
            ]
        );

        session()->setFlashdata('pesan', 'Data Administrator berhasil diedit !');
        return redirect()->to('/admin/administrator');
    }

    public function delete($admin_id)
    {
        $this->administrator->delete($admin_id);
        session()->setFlashdata('pesan', 'Data Administrator berhasil dihapus !');
        return redirect()->to('/admin/administrator');
    }
}
