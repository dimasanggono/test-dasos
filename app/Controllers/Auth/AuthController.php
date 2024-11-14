<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{

    public function login()
    { {
            if ($this->validate([

                'email' => [
                    'label'  => 'Email',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} Wajib diisi !!',
                    ],
                ],
                'password' => [
                    'label'  => 'Password',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} Wajib diisi !!'
                    ],
                ],
            ])) {
                // jika valid 
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $cek = $this->ModelAuth->login($email, $password);
                if ($cek) {
                    session()->set('log', true);
                    session()->set('nama_user', $cek['nama_user']);
                    session()->set('id_user', $cek['id_user']);
                    session()->set('email', $cek['email']);
                    // session()->set('foto', $cek['foto']);
                    return redirect()->to(base_url('UserController/index'));
                } else {
                    session()->setFlashdata('message', 'Login Gagal !! Email atau Passwords Salah!! ');
                    return redirect()->to(base_url('Home/index'));
                }
            } else {
                // jia tidak valid
                session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
                return redirect()->to(base_url('Auth/index'));
            }
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('nama');
        session()->remove('email');
        session()->remove('level');
        session()->remove('foto');
        session()->setFlashdata('message', 'Anda Telah Logout!!');
        return redirect()->to(base_url('Auth/index'));
    }
}
