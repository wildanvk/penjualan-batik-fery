<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;
use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $helpers = [];
    public $kategori_model;
    public $produk_model;

    public function __construct()
    {
        helper(['form']);
        $this->kategori_model = new KategoriModel();
        $this->produk_model = new ProdukModel();
    }

    public function index()
    {
        $data['produk'] = $this->produk_model->getProduk();
        return view('produk/index', $data);
    }

    public function create()
    {
        $kategori = $this->kategori_model->where('status', 'Active')->findAll();
        $data['kategori'] = ['' => 'Pilih kategori'] + array_column($kategori, 'nama_kategori', 'id_kategori');
        return view('produk/create', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        //Get file
        $image = $this->request->getFile('gambar_produk');
        //Random image file
        $name = $image->getRandomName();

        $data = [
            'id_kategori'  => $this->request->getPost('id_kategori'),
            'nama_produk'  => $this->request->getPost('nama_produk'),
            'harga_produk'  => $this->request->getPost('harga_produk'),
            'status'  => $this->request->getPost('status'),
            'gambar_produk'  => $name,
            'deskripsi'  => $this->request->getPost('deskripsi')
        ];

        if ($validation->run($data, 'produk') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('produk/create'));
        } else {
            //Upload
            $image->move(ROOTPATH . 'public/uploads', $name);

            //Insert
            $simpan = $this->produk_model->insertProduk($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Produk berhasil ditambahkan');
                return redirect()->to('/produk');
            }
        }
    }

    public function show($id)
    {
        $data['produk'] = $this->produk_model->getProduk($id);
        echo view('produk/show', $data);
    }

    public function edit($id)
    {
        $kategori = $this->kategori_model->where('status', 'Active')->findAll();
        $data['kategori'] = ['' => 'Pilih kategori'] + array_column($kategori, 'nama_kategori', 'id_kategori');

        $data['produk'] = $this->produk_model->getProduk($id);
        echo view('produk/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_produk');

        $validation = \Config\Services::validation();

        //Get file
        $image = $this->request->getFile('gambar_produk');
        //Random image file
        if ($image->getError() == 4) {
            $name = $this->request->getPost('old_gambar_produk');
        } else {
            $name = $image->getRandomName();
            unlink(ROOTPATH . 'public/uploads/' . $this->request->getPost('old_gambar_produk'));
        }

        $data = [
            'id_kategori'  => $this->request->getPost('id_kategori'),
            'nama_produk'  => $this->request->getPost('nama_produk'),
            'harga_produk'  => $this->request->getPost('harga_produk'),
            'status'  => $this->request->getPost('status'),
            'gambar_produk'  => $name,
            'deskripsi'  => $this->request->getPost('deskripsi')
        ];

        if ($validation->run($data, 'produk_edit') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('produk/edit/' . $id));
        } else {
            //update
            if (!$image->getError() == 4) {
                $image->move(ROOTPATH . 'public/uploads', $name);
            }

            $ubah = $this->produk_model->updateProduk($data, $id);
            if ($ubah) {
                session()->setFlashdata('success', 'Produk berhasil diupdate');
                return redirect()->to('/produk');
            }
        }
    }

    public function delete($id)
    {
        $hapus = $this->produk_model->deleteProduk($id);
        if ($hapus) {
            session()->setFlashdata('success', 'Produk berhasil dihapus');
            return redirect()->to('/produk');
        }
    }
}
