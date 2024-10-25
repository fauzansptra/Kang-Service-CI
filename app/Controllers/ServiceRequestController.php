<?php

namespace App\Controllers;

use App\Models\ServiceRequestModel;

class ServiceRequestController extends BaseController
{
    protected $serviceRequestModel;

    public function __construct()
    {
        $this->serviceRequestModel = new ServiceRequestModel();
    }

    public function index()
    {
        // List service requests (admin and technician)
        $this->checkRoles(['admin', 'technician']);
        $data['serviceRequests'] = $this->serviceRequestModel->findAll();
        return view('service_requests/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $this->serviceRequestModel->save($this->request->getPost());
            return redirect()->to('/service-request');
        }
        return view('service_requests/create');
    }

    public function update($id)
    {
        $request = $this->serviceRequestModel->find($id);
        if ($this->request->getMethod() === 'post') {
            $this->serviceRequestModel->update($id, $this->request->getPost());
            return redirect()->to('/service-request');
        }
        return view('service_requests/edit', ['request' => $request]);
    }

    public function delete($id)
    {
        $this->serviceRequestModel->delete($id);
        return redirect()->to('/service-request');
    }
}
