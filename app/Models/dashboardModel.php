<?php namespace App\Models;

use CodeIgniter\Model;

class dashboardModel extends Model
{
    protected $table      = 'akun_admin';
    protected $useTimestamps = true;
    protected $allowedFields = ['role', 'foto', 'username', 'email', 'password', 'slug'];

    public function getDashboard($slug = false)
    {
        if($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        // $builder = $this->table('buku');
        // $builder->like('ebook', $keyword);
        // return $builder;

        return $this->table('akun_admin')->like('username', $keyword)->orLike('role', $keyword)->orLike('email', $keyword)->orLike('id', $keyword);
    }

}