<?php

namespace App\Controllers;

use App\Models\ServiceRequestModel;
use CodeIgniter\Controller;

class ServiceRequestController extends Controller
{
    protected $serviceRequestModel;

    public function __construct()
    {
        $this->serviceRequestModel = new ServiceRequestModel();
    }

    public function index()
    {
        $requests = $this->serviceRequestModel->findAll();
        return view('service_request/index', ['requests' => $requests]);
    }

    public function create()
    {
        if ($this->request->getMethod() == 'post') {
            $data = [
                'device_name' => $this->request->getPost('device_name'),
                'issue_description' => $this->request->getPost('issue_description'),
                'device_type' => $this->request->getPost('device_type'),
                'status' => 'queued', // Set default status
                'user_id' => session()->get('user_id') // Get user ID from session
            ];

            $this->serviceRequestModel->save($data);
            return redirect()->to('/service-request')->with('success', 'Service request submitted successfully.');
        }

        return view('service_request/create');
    }

    public function update($id)
    {
        $request = $this->serviceRequestModel->find($id);

        if ($this->request->getMethod() == 'post') {
            $data = [
                'status' => $this->request->getPost('status')
            ];
            $this->serviceRequestModel->update($id, $data);
            return redirect()->to('/service-request')->with('success', 'Service request updated successfully.');
        }

        return view('service_request/edit', ['request' => $request]);
    }

    public function delete($id)
    {
        $this->serviceRequestModel->delete($id);
        return redirect()->to('/service-request')->with('success', 'Service request deleted successfully.');
    }
}
