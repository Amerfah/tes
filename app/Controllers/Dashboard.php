<?php

namespace App\Controllers;
use App\Models\ArtikelModel;
use App\Models\FeedbackModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $artikelModel = new ArtikelModel();
        $feedbackModel = new FeedbackModel();

        $data = [
            'judul' => 'Dashboard',
            'jumlah_artikel' => $artikelModel->countAll(),
            'jumlah_feedback' => $feedbackModel->countAll(),
        ];

        return view('admin/dashboard', $data);
    }
}
