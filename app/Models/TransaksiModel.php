<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id_transaksi';
    protected $allowedFields    = ['id_user', 'alamat', 'total_bayar', 'status'];

    public function getTransaksi($id = false)
    {
        if ($id == false) {
            return $this->db->table('transaksi')
                ->join('user', 'user.id_user = transaksi.id_user')
                ->get()
                ->getResultArray();
        }
        return $this->db->table('transaksi')
            ->join('user', 'user.id_user = transaksi.id_user')
            ->where(['id_transaksi' => $id])
            ->get()
            ->getRowArray();
    }

    public function getActiveTransaksi($id = false)
    {
        if ($id == false) {
            return $this->db->table('transaksi')
                ->get()
                ->getResultArray();
        }
        return $this->db->table('transaksi')
            ->where(['id_user' => $id])
            ->get()
            ->getResultArray();
    }

    public function getActiveTransaksiCount($id)
    {
        return $this->db->table('transaksi')
            ->where(['id_user' => $id])
            ->where('status !=', 'Selesai')
            ->countAllResults();
    }

    public function getTransaksiSelesai()
    {
        return $this->db->table('transaksi')
            ->join('user', 'user.id_user = transaksi.id_user')
            ->where('status', 'Selesai')
            ->get()
            ->getResultArray();
    }

    public function getTransaksiSelesaiByBulan($bulan = false)
    {
        if ($bulan) {
            return $this->db->table('transaksi')
                ->join('user', 'user.id_user = transaksi.id_user')
                ->where('status', 'Selesai')
                ->where('MONTH(created_at)', $bulan)
                ->get()
                ->getResultArray();
        } else {
            return $this->db->table('transaksi')
                ->join('user', 'user.id_user = transaksi.id_user')
                ->where('status', 'Selesai')
                ->get()
                ->getResultArray();
        }
    }

    public function insertTransaksi($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateTransaksi($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_transaksi' => $id]);
    }

    public function deleteTransaksi($id)
    {
        return $this->db->table($this->table)->delete(['id_transaksi' => $id]);
    }
}
