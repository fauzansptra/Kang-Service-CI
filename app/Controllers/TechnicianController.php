<?php

namespace App\Controllers;

use App\Models\TechnicianModel;
use App\Models\ServiceRequestModel;
use CodeIgniter\Controller;

class TechnicianController extends Controller
{
    protected $technicianModel;
    protected $serviceRequestModel;

    public function __construct()
    {
        $this->technicianModel = new TechnicianModel();
        $this->serviceRequestModel = new ServiceRequestModel();
    }

    public function index()
    {
        $technicians = $this->technicianModel->findAll();
        return view('technician/index', ['technicians' => $technicians]);
    }

    public function assign($requestId)
    {
        if ($this->request->getMethod() == 'post') {
            $technicianId = $this->request->getPost('technician_id');
            $data = [
                'technician_id' => $technicianId,
                'status' => 'assigned' // Update status to assigned
            ];

            $this->serviceRequestModel->update($requestId, $data);
            return redirect()->to('/service-request')->with('success', 'Service request assigned to technician.');
        }

        // Fetch technicians for selection
        $technicians = $this->technicianModel->findAll();
        return view('technician/assign', ['technicians' => $technicians, 'requestId' => $requestId]);
    }
}
