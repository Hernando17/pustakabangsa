<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'akun_admin';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['foto', 'role', 'username', 'email', 'password', 'slug'];
    
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}