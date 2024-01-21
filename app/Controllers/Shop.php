<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\KeranjangModel;
use App\Models\UserModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;

class Shop extends BaseController
{
    protected $produkModel;
    protected $keranjangModel;
    protected $userModel;
    protected $transaksiModel;
    protected $detailTransaksiModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->keranjangModel = new KeranjangModel();
        $this->userModel = new UserModel();
        $this->transaksiModel = new TransaksiModel();
        $this->detailTransaksiModel = new DetailTransaksiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Toko Batik',
            'produk' => $this->produkModel->getProduk(),
            'keranjang' => $this->keranjangModel->getCountKeranjang(session()->get('id_user')),
            'aktifTransaksi' => $this->transaksiModel->getActiveTransaksiCount(session()->get('id_user'))
        ];

        return view('user/shop/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Produk',
            'produk' => $this->produkModel->getProduk($id),
            'keranjang' => $this->keranjangModel->getCountKeranjang(session()->get('id_user')),
            'aktifTransaksi' => $this->transaksiModel->getActiveTransaksiCount(session()->get('id_user'))
        ];

        return view('user/shop/detail', $data);
    }

    public function riwayatTransaksi()
    {
        $data = [
            'title' => 'Riwayat Transaksi',
            'transaksi' => $this->transaksiModel->getActiveTransaksi(session()->get('id_user')),
            'keranjang' => $this->keranjangModel->getCountKeranjang(session()->get('id_user')),
            'aktifTransaksi' => $this->transaksiModel->getActiveTransaksiCount(session()->get('id_user'))
        ];

        return view('user/shop/transaksi', $data);
    }

    public function cart()
    {

        $listKeranjang = $this->keranjangModel->getKeranjang(session()->get('id_user'));

        foreach ($listKeranjang as $key => $value) {
            $listKeranjang[$key]['total'] = $value['harga_produk'] * $value['jumlah'];
        }

        $grandTotal = 0;
        foreach ($listKeranjang as $key => $value) {
            $grandTotal += $value['total'];
        }

        $data = [
            'title' => 'Keranjang Belanja',
            'listKeranjang' => $listKeranjang,
            'user' => $this->userModel->getUser(session()->get('id_user')),
            'grandTotal' => $grandTotal,
            'keranjang' => $this->keranjangModel->getCountKeranjang(session()->get('id_user')),
            'aktifTransaksi' => $this->transaksiModel->getActiveTransaksiCount(session()->get('id_user'))
        ];

        return view('user/shop/cart', $data);
    }

    public function addToCart($id)
    {
        $produk = $this->produkModel->getProduk($id);
        $jumlah = $this->request->getVar('jumlah');

        $data = [
            'id_user' => session()->get('id_user'),
            'id_produk' => $produk['id_produk'],
            'jumlah' => $jumlah ? $jumlah : 1
        ];

        $checkAdded = $this->keranjangModel->checkAdded(session()->get('id_user'), $produk['id_produk']);
        if ($checkAdded) {
            $data['jumlah'] = $checkAdded['jumlah'] + ($jumlah ? $jumlah : 1);
            $updateCart = $this->keranjangModel->updateKeranjang($data, $checkAdded['id_cart']);
            if ($updateCart) {
                session()->setFlashdata('tambahKeranjang', 'Produk berhasil ditambahkan ke keranjang!');
                return redirect()->to('/shop');
            }
        }

        $addCart = $this->keranjangModel->insertKeranjang($data);
        if ($addCart) {
            session()->setFlashdata('tambahKeranjang', 'Produk berhasil ditambahkan ke keranjang!');
            return redirect()->to('/shop');
        }
    }

    public function updateCart()
    {
        $id = $this->request->getVar('id_cart');
        $jumlah = $this->request->getVar('jumlah');

        $data = [
            'jumlah' => $jumlah
        ];

        $updateCart = $this->keranjangModel->updateKeranjang($data, $id);
        if ($updateCart) {
            session()->setFlashdata('updateKeranjang', 'Keranjang berhasil diupdate!');
            return redirect()->to('/shop/cart');
        }
    }

    public function deleteCart($id)
    {
        $deleteCart = $this->keranjangModel->deleteKeranjang($id);
        if ($deleteCart) {
            session()->setFlashdata('deleteKeranjang', 'Keranjang berhasil dihapus!');
            return redirect()->to('/shop/cart');
        }
    }

    public function checkout()
    {
        $validation = \Config\Services::validation();
        $listKeranjang = $this->keranjangModel->getKeranjang(session()->get('id_user'));

        foreach ($listKeranjang as $key => $value) {
            $listKeranjang[$key]['total'] = $value['harga_produk'] * $value['jumlah'];
        }

        $grandTotal = 0;
        foreach ($listKeranjang as $key => $value) {
            $grandTotal += $value['total'];
        }

        $prefix = "T";
        $date = date("Ymd");
        $randomNumber = rand(1000, 9999);
        $idTransaksi = $prefix . "-" . $date . "-" . $randomNumber;

        $dataTransaksi = [
            'id_transaksi' => $idTransaksi,
            'id_user' => session()->get('id_user'),
            'alamat' => $this->request->getVar('alamat'),
            'total_bayar' => $grandTotal,
        ];

        if ($validation->run($dataTransaksi, 'checkout') == FALSE) {
            session()->setFlashdata('gagal', 'Alamat pengiriman harus diisi!');
            return redirect()->to('/shop/cart');
        } else {
            $addTransaksi = $this->transaksiModel->insertTransaksi($dataTransaksi);
            if ($addTransaksi) {
                foreach ($listKeranjang as $key => $value) {
                    $dataDetailTransaksi = [
                        'id_transaksi' => $idTransaksi,
                        'id_produk' => $value['id_produk'],
                        'jumlah' => $value['jumlah'],
                        'total_harga' => $value['total'],
                    ];
                    $addDetailTransaksi = $this->detailTransaksiModel->insertDetailTransaksi($dataDetailTransaksi);
                }
                if ($addDetailTransaksi) {
                    $deleteCart = $this->keranjangModel->deleteKeranjangUser(session()->get('id_user'));
                    if ($deleteCart) {
                        session()->setFlashdata('checkout', 'Checkout berhasil! Harap tunggu pesanan Anda.');
                        return redirect()->to('/shop/cart');
                    }
                }
            }
        }
    }
}
