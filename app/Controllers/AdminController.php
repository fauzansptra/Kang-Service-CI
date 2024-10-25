<?php

namespace App\Controllers;

use App\Models\AdminModel;

class AdminController extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        // List all admins (admin only)
        $this->checkRole('admin');
        $data['admins'] = $this->adminModel->findAll();
        return view('admins/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $this->adminModel->save($this->request->getPost());
            return redirect()->to('/admin');
        }
        return view('admins/create');
    }

    public function update($id)
    {
        $admin = $this->adminModel->find($id);
        if ($this->request->getMethod() === 'post') {
            $this->adminModel->update($id, $this->request->getPost());
            return redirect()->to('/admin');
        }
        return view('admins/edit', ['admin' => $admin]);
    }

    public function delete($id)
    {
        $this->adminModel->delete($id);
        return redirect()->to('/admin');
    }
}
