<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';

    public function getProduk($id = false)
    {
        if ($id === false) {
            return $this->table('produk')
                ->select('produk.*, kategori.nama_kategori')
                ->join('kategori', 'kategori.id_kategori = produk.id_kategori')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('produk')
                ->select('produk.*, kategori.nama_kategori')
                ->join('kategori', 'kategori.id_kategori = produk.id_kategori')
                ->where('produk.id_produk', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function getCountProduk()
    {
        return $this->db->table('produk')
            ->countAllResults();
    }

    public function insertProduk($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateProduk($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_produk' => $id]);
    }

    public function deleteProduk($id)
    {
        return $this->db->table($this->table)->delete(['id_produk' => $id]);
    }
}
