<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class Shop extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Toko Batik',
            'produk' => $this->produkModel->getProduk()
        ];

        return view('user/shop/index', $data);
    }
}
