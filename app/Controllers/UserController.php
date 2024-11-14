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
            "password" => hash($this->request->getPost('password')),
        ];
        $this->ModelUser->insertData($data);
        session()->setFlashdata('success', 'Data Berhasilsil Ditambahkan');
        return redirect()->to(base_url('admin/user'));
    }
}
