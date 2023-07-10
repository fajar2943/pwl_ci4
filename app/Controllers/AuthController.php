<?php

namespace App\Controllers;

use App\Models\userModel;

class AuthController extends BaseController
{
    protected $user;

    function __construct()
    {
        helper('form');
        $this->user = new userModel();
    }

    public function register()
    {
        if ($this->request->getPost()) {

            $this->user->insert([
                'nama' => $this->request->getVar('nama'), 'email' => $this->request->getVar('email'), 'telp' => $this->request->getVar('telp'),
                'user_role' => 'Customer', 'password' => md5($this->request->getVar('password'))
            ]); 

            session()->set([
                'nama' => $this->request->getVar('nama'),
                'user_role' => 'Customer',
                'isLoggedIn' => TRUE
            ]);

            return redirect()->to(base_url('/'));

        } else {
            return view('register_view');
        }
    }
    
    public function login()
    {
        if ($this->request->getPost()) {
            $nama = $this->request->getVar('nama');
            $password = $this->request->getVar('password');

            $dataUser = $this->user->where(['nama' => $nama])->first();

            if ($dataUser) {
                if (md5($password) == $dataUser['password'] && $dataUser['is_active']) {
                    session()->set([
                        'nama' => $dataUser['nama'],
                        'user_role' => $dataUser['user_role'],
                        'isLoggedIn' => TRUE
                    ]);

                    return redirect()->to(base_url('/'));
                } else {
                    session()->setFlashdata('failed', 'Nama & Password Salah');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('failed', 'Nama Tidak Ditemukan');
                return redirect()->back();
            }
        } else {
            return view('login_view');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}