<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'User',
            'user' => $this->userModel->AllData(),
            'pages' => 'user/index'
        ];
        return view('v_template', $data);
    }
    public function insert()
    {
        $data = [
            "nama_user" => $this->request->getPost('nama_user'),
            "no_tlpn" => $this->request->getPost('no_tlpn'),
            "email" => $this->request->getPost('email'),
            "password" => sha1($this->request->getPost('password')),
        ];
        $this->userModel->insertData($data);
        session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('UserController/index'));
    }

    public function edit($id_user)
    {
        $data = [
            'title' => 'Edit User',
            "subtitle" => "Edit User",
            "menu" => "User",
            'pages' => 'user/edit',
            "user" => $this->userModel->DetailData($id_user),
        ];
        return view('v_template', $data);
    }

    public function update($id_user)
    {
        $data = [
            "id_user" => $id_user,
            "nama_user" => $this->request->getPost('nama_user'),
            "no_tlpn" => $this->request->getPost('no_tlpn'),
            "email" => $this->request->getPost('email'),
            "password" => sha1($this->request->getPost('password')),
        ];
        $this->userModel->editData($data);
        session()->setFlashdata('update', 'Data Berhasil Diupdate');
        return redirect()->to(base_url('UserController/index'));
    }

    public function delete($id_user)
    {
        $data = [
            'id' => $id_user,
        ];
        $this->userModel->deleteData($data);
        session()->setFlashdata('delete', 'Data Berhasilsil Dihapus');
        return redirect()->to(base_url('UserController/index'));
    }
}
