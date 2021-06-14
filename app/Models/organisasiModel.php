<?php namespace App\Models;

use CodeIgniter\Model;

class organisasiModel extends Model
{
    protected $table      = 'organisasi';
    protected $useTimestamps = true;
    protected $allowedFields = ['foto', 'nama', 'slug'];

    public function getOrganisasi($slug = false)
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

        return $this->table('organisasi')->like('nama', $keyword)->orLike('id', $keyword);
    }
}
