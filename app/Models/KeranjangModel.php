<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table            = 'cart';
    protected $primaryKey       = 'id_cart';
    protected $allowedFields    = ['id_user', 'id_produk', 'jumlah'];

    public function getKeranjang($id = false)
    {
        if ($id == false) {
            return $this->db->table('cart')
                ->join('produk', 'produk.id_produk = cart.id_produk')
                ->join('kategori', 'kategori.id_kategori = produk.id_kategori')
                ->get()
                ->getResultArray();
        }
        return $this->db->table('cart')
            ->join('produk', 'produk.id_produk = cart.id_produk')
            ->join('kategori', 'kategori.id_kategori = produk.id_kategori')
            ->where(['id_user' => $id])
            ->orderBy('id_cart', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getCountKeranjang($id)
    {
        return $this->db->table('cart')
            ->where(['id_user' => $id])
            ->countAllResults();
    }

    public function checkAdded($id_user, $id_produk)
    {
        return $this->db->table('cart')
            ->where(['id_user' => $id_user, 'id_produk' => $id_produk])
            ->get()
            ->getRowArray();
    }

    public function insertKeranjang($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateKeranjang($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_cart' => $id]);
    }

    public function deleteKeranjang($id)
    {
        return $this->db->table($this->table)->delete(['id_cart' => $id]);
    }

    public function deleteKeranjangUser($id)
    {
        return $this->db->table($this->table)->delete(['id_user' => $id]);
    }
}
