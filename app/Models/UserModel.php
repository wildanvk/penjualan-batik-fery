<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $allowedFields    = ['nama', 'jenis_kelamin', 'email', 'telepon', 'password'];

    public function getUser($id = false)
    {
        if ($id == false) {
            return $this->db->table('user')
                ->get()
                ->getResultArray();
        }
        return $this->db->table('user')
            ->where(['id_user' => $id])
            ->get()
            ->getRowArray();
    }

    public function insertUser($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateUser($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function deleteUser($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }
}
