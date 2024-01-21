<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;

class Transaksi extends BaseController
{
    protected $transaksiModel;
    protected $detailTransaksiModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->detailTransaksiModel = new DetailTransaksiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Transaksi',
            'transaksi' => $this->transaksiModel->getTransaksi(),
        ];

        return view('transaksi/index', $data);
    }

    public function show($id)
    {
        $data = [
            'title' => 'Detail Transaksi',
            'detailTransaksi' => $this->detailTransaksiModel->getDetailTransaksi($id),
            'transaksi' => $this->transaksiModel->getTransaksi($id)
        ];

        return view('transaksi/show', $data);
    }

    public function update()
    {
        $idTransaksi = $this->request->getVar('id_transaksi');
        $data = [
            'status' => $this->request->getVar('status')
        ];

        $update = $this->transaksiModel->updateTransaksi($data, $idTransaksi);

        if ($update) {
            session()->setFlashdata('success', 'Status transaksi berhasil diupdate');
            return redirect()->to('/admin/transaksi');
        }
    }
}
