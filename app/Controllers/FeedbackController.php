<?php

namespace App\Controllers;

use App\Models\FeedbackModel;

class FeedbackController extends BaseController
{
    protected $feedbackModel;

    public function __construct()
    {
        $this->feedbackModel = new FeedbackModel();
    }

    public function index()
    {
        // List feedback (admin only)
        $this->checkRole('admin');
        $data['feedbacks'] = $this->feedbackModel->findAll();
        return view('feedbacks/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $this->feedbackModel->save($this->request->getPost());
            return redirect()->to('/feedback');
        }
        return view('feedbacks/create');
    }

    public function update($id)
    {
        $feedback = $this->feedbackModel->find($id);
        if ($this->request->getMethod() === 'post') {
            $this->feedbackModel->update($id, $this->request->getPost());
            return redirect()->to('/feedback');
        }
        return view('feedbacks/edit', ['feedback' => $feedback]);
    }

    public function delete($id)
    {
        $this->feedbackModel->delete($id);
        return redirect()->to('/feedback');
    }
}
