<?php

namespace App\Controllers;
use App\Models\FeedbackModel;

class Feedback extends BaseController
{
    protected $feedbackModel;

    public function __construct()
    {
        $this->feedbackModel = new FeedbackModel();
    }

    public function index()
    {
        $data['judul'] = 'Feedback Pengguna';
        $data['feedback'] = $this->feedbackModel->findAll();

        return view('admin/feedback', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        if (!$this->validate([
            'nama' => 'required',
            'email' => 'required|valid_email',
            'pesan' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->feedbackModel->save([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'pesan' => $this->request->getPost('pesan')
        ]);

        return redirect()->to('/feedback')->with('success', 'Feedback berhasil dikirim.');
    }
}
