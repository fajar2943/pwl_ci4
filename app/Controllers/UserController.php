<?php

namespace App\Controllers;

use App\Models\userModel;

class UserController extends BaseController
{
    protected $user;

    function __construct()
    {
        helper('form');
        $this->user = new userModel();
    }

    public function index()
    {
        $data['users'] = $this->user->findAll();
        return view('pages/user_view', $data);
    }

    public function create(){
        // dd($this->request->getPost('is_active'));
        $this->user->insert([
            'nama' => $this->request->getPost('nama'), 'email' => $this->request->getPost('email'), 'telp' => $this->request->getPost('telp'),
            'password' => md5($this->request->getPost('password') ?? ''), 'user_role' => $this->request->getPost('user_role'),
            'is_active' => $this->request->getPost('is_active'),
        ]);
        return redirect('user')->with('success','Data Berhasil Ditambah');
    }

    public function edit($id){
        $this->user->update($id, [
            'nama' => $this->request->getPost('nama'), 'email' => $this->request->getPost('email'), 'telp' => $this->request->getPost('telp'),
            'user_role' => $this->request->getPost('user_role'), 'is_active' => $this->request->getPost('is_active'),
        ]);

        return redirect('user')->with('success','Data Berhasil Diubah');
    }
}