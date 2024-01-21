<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    protected $produkModel;
    protected $transaksiModel;
    protected $userModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->transaksiModel = new TransaksiModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'produk' => $this->produkModel->getCountProduk(),
            'transaksi' => $this->transaksiModel->getCountTransaksiSelesai(),
            'pendapatan' => $this->transaksiModel->getSumTransaksiSelesai(),
            'user' => $this->userModel->getCountUser(),
            'grafikTransaksi' => $this->transaksiModel->getGrafikTransaksi(),
            'grafikPendapatan' => $this->transaksiModel->getGrafikPendapatan()
        ];


        return view('dashboard', $data);
    }
}
