<?php

namespace App\Controllers;

use App\Models\ServiceHistoryModel;

class ServiceHistoryController extends BaseController
{
    protected $serviceHistoryModel;

    public function __construct()
    {
        $this->serviceHistoryModel = new ServiceHistoryModel();
    }

    public function index()
    {
        // List service history (admin only)
        $this->checkRole('admin');
        $data['serviceHistories'] = $this->serviceHistoryModel->findAll();
        return view('service_histories/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $this->serviceHistoryModel->save($this->request->getPost());
            return redirect()->to('/service-history');
        }
        return view('service_histories/create');
    }

    public function update($id)
    {
        $history = $this->serviceHistoryModel->find($id);
        if ($this->request->getMethod() === 'post') {
            $this->serviceHistoryModel->update($id, $this->request->getPost());
            return redirect()->to('/service-history');
        }
        return view('service_histories/edit', ['history' => $history]);
    }

    public function delete($id)
    {
        $this->serviceHistoryModel->delete($id);
        return redirect()->to('/service-history');
    }
}
