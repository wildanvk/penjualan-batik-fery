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
}
