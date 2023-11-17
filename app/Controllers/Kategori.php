<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function index()
    {
        $model = new KategoriModel();
        $data['categories'] = $model->getkategori();
        echo view('kategori/index', $data);
    }

    public function create()
    {
        return view('kategori/create');
    }

    public function store()
    {
        $validation =  \Config\Services::validation();

        $data = array(
            'nama_kategori'     => $this->request->getVar('nama_kategori'),
            'status'   => $this->request->getVar('status')
        );

        if ($validation->run($data, 'kategori') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('kategori/create'));
        } else {
            $model = new KategoriModel();
            $simpan = $model->insertKategori($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Kategori berhasil ditambahkan');
                return redirect()->to(base_url('kategori'));
            }
        }
    }

    public function edit($id)
    {
        $model = new KategoriModel();
        $data['kategori'] = $model->getkategori($id)->getRowArray();
        echo view('kategori/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_kategori');
        $validation = \Config\Services::validation();

        $data = array(
            'nama_kategori'     => $this->request->getPost('nama_kategori'),
            'status'   => $this->request->getPost('status')
        );

        if ($validation->run($data, 'kategori') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('kategori/edit/' . $id));
        } else {
            $model = new KategoriModel();
            $ubah = $model->updateKategori($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Kategori berhasil diupdate');
                return redirect()->to(base_url('kategori'));
            }
        }
    }

    public function delete($id)
    {
        $model = new KategoriModel();
        $hapus = $model->deleteKategori($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Katgori berhasil dihapus');
            return redirect()->to(base_url('kategori'));
        }
    }
}