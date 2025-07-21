<?php

namespace App\Controllers;
use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    protected $artikelModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    public function index()
    {
        $data['judul'] = 'Daftar Artikel';
        $data['artikel'] = $this->artikelModel->findAll();

        return view('admin/artikel_list', $data);
    }

    public function create()
    {
        $data['judul'] = 'Tambah Artikel';
        return view('admin/artikel_form', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        if (!$this->validate([
            'judul' => 'required',
            'status' => 'required|in_list[draft,publish]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->artikelModel->save([
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->to('/artikel')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Artikel';
        $data['artikel'] = $this->artikelModel->find($id);

        return view('admin/artikel_form', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();

        if (!$this->validate([
            'judul' => 'required',
            'status' => 'required|in_list[draft,publish]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->artikelModel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->to('/artikel')->with('success', 'Artikel berhasil diupdate.');
    }

    public function delete($id)
    {
        $this->artikelModel->delete($id);
        return redirect()->to('/artikel')->with('success', 'Artikel berhasil dihapus.');
    }
}

