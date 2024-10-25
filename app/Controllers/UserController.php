<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // List all users (admin only)
        $this->checkRole('admin');
        $data['users'] = $this->userModel->findAll();
        return view('users/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $this->userModel->save($this->request->getPost());
            return redirect()->to('/user');
        }
        return view('users/create');
    }

    public function update($id)
    {
        $user = $this->userModel->find($id);
        if ($this->request->getMethod() === 'post') {
            $this->userModel->update($id, $this->request->getPost());
            return redirect()->to('/user');
        }
        return view('users/edit', ['user' => $user]);
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/user');
    }
}
