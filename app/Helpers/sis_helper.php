<?php 

use App\Models\AuthModel;

function allow($role){
    $session = \Config\Services::session();
    $user = $session->get('username');
    $tabel = 'akun_admin';
    $model = new AuthModel;
    $row = $model->get_data_login($user,$tabel);
    if ($row != NULL){
        if ($row->role == $role){
            return true;
        } else {
            return false;
        }
    }
}

