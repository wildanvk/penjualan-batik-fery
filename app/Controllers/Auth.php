<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

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

    public function auth()
    {
        $session = session();
        $model  =  new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            if ($pass == $password) {
                $session_data = [
                    'user_id'    => $data['user_id'],
                    'username'   => $data['username'],
                    'logged_in'  => TRUE
                ];
                $session->set($session_data);
                return redirect()->to('/dashboard/index');
            } else {
                $session->setFlashdata('pesan', 'Password yang anda masukkan salah!');
                return redirect()->to('/auth');
            }
        } else {
            $session->setFlashdata('pesan', 'Username yang anda masukkan tidak ada!');
            return redirect()->to('/auth');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        $session->setFlashdata('pesan', 'Berhasil logout');
        return redirect()->to('/auth');
    }
}
