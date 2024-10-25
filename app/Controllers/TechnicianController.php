<?php

namespace App\Controllers;

use App\Models\TechnicianModel;

class TechnicianController extends BaseController
{
    protected $technicianModel;

    public function __construct()
    {
        $this->technicianModel = new TechnicianModel();
    }

    public function index()
    {
        // List all technicians (admin only)
        $this->checkRole('admin');
        $data['technicians'] = $this->technicianModel->findAll();
        return view('technicians/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $this->technicianModel->save($this->request->getPost());
            return redirect()->to('/technician');
        }
        return view('technicians/create');
    }

    public function update($id)
    {
        $technician = $this->technicianModel->find($id);
        if ($this->request->getMethod() === 'post') {
            $this->technicianModel->update($id, $this->request->getPost());
            return redirect()->to('/technician');
        }
        return view('technicians/edit', ['technician' => $technician]);
    }

    public function delete($id)
    {
        $this->technicianModel->delete($id);
        return redirect()->to('/technician');
    }
}
