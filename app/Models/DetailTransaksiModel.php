<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksiModel extends Model
{
    protected $table            = 'detail_transaksi';
    protected $primaryKey       = 'id_detail';
    protected $allowedFields    = ['id_transaksi', 'id_produk', 'jumlah', 'total_harga'];

    public function getDetailTransaksi($id = false)
    {
        if ($id == false) {
            return $this->db->table('detail_transaksi')
                ->join('produk', 'produk.id_produk = detail_transaksi.id_produk')
                ->get()
                ->getResultArray();
        }
        return $this->db->table('detail_transaksi')
            ->join('produk', 'produk.id_produk = detail_transaksi.id_produk')
            ->where(['id_transaksi' => $id])
            ->get()
            ->getResultArray();
    }

    public function insertDetailTransaksi($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateDetailTransaksi($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_detail' => $id]);
    }

    public function deleteDetailTransaksi($id)
    {
        return $this->db->table($this->table)->delete(['id_detail' => $id]);
    }
}
