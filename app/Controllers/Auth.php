<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Auth extends BaseController
{
    public function index()
    {
        $session = session();
        if (session()->get('logged_in') == TRUE) {
            return redirect()->to('/dashboard');
        } else {
            return view('auth/login');
        }
    }

    public function verification()
    {
        $session = session();
        $model  =  new AdminModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            if ($pass == $password) {
                $session_data = [
                    'role' => 'admin',
                    'id_admin'    => $data['id_admin'],
                    'username'   => $data['username'],
                    'admin_logged_in'  => TRUE
                ];
                $session->set($session_data);
                return redirect()->to('/admin/dashboard');
            } else {
                $session->setFlashdata('pesan', 'Password yang anda masukkan salah!');
                return redirect()->to('/admin/auth');
            }
        } else {
            $session->setFlashdata('pesan', 'Username yang anda masukkan tidak ada!');
            return redirect()->to('/admin/auth');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        $session->setFlashdata('pesan', 'Berhasil logout');
        return redirect()->to('/admin/auth');
    }
}
