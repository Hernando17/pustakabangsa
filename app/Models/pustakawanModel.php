<?php namespace App\Models;

use CodeIgniter\Model;

class pustakawanModel extends Model
{
    protected $table      = 'pustakawan';
    protected $useTimestamps = true;
    protected $allowedFields = ['foto', 'username', 'twitter', 'instagram', 'facebook', 'slug', 'jabatan'];

    public function getPustakawan($slug = false)
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

        return $this->table('pustakawan')->like('username', $keyword)->orLike('twitter', $keyword)->orLike('instagram', $keyword)->orLike('facebook', $keyword)->orLike('id', $keyword)->orLike('jabatan', $keyword);
    }
}
