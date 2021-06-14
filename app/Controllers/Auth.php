<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\AuthModel;

class Auth extends Controller
{

    public function login()
    {
        $model = new AuthModel;
        $table = 'akun_admin';
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $row = $model->get_data_login($username, $table);
        // var_dump($row);

        if ($row == NULL) {
            session()->setFlashdata('pesan', 'username anda salah');
            return redirect()->to('/Login');
        }
        if (password_verify($password, $row->password)) {
            $data = array(
                'log' => TRUE,
                'foto' => $row->foto,
                'role' => $row->role,
                'username' => $row->username,
                'email' => $row->email,
                'slug' => $row->slug,
            );
            session()->set($data);
            session()->setFlashdata('pesan', 'Berhasil Login');
            return redirect()->to('/Home/Dashboard');
        };
        session()->setFlashdata('pesan', 'Password salah');
        return redirect()->to('/Login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        session()->setFlashdata('pesan', 'berhasil logout');
        return redirect()->to('/Login');
    }
}
