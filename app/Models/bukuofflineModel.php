<?php

namespace App\Models;

use CodeIgniter\Model;

class bukuofflineModel extends Model
{
    protected $table      = 'offline';
    protected $useTimestamps = true;
    protected $allowedFields = ['sampul', 'judul', 'penulis', 'penerbit', 'slug', 'genre', 'deskripsi', 'kode', 'isbn', 'tglpenerbitan', 'stock'];

    public function getBukuoffline($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        // $builder = $this->table('buku');
        // $builder->like('ebook', $keyword);
        // return $builder;

        return $this->table('offline')->like('judul', $keyword)->orLike('penulis', $keyword)->orLike('penerbit', $keyword)->orLike('id', $keyword)->orLike('kode', $keyword)->orLike('genre', $keyword)->orLike('isbn', $keyword)->orLike('tglpenerbitan', $keyword)->orLike('stock', $keyword);
    }
}
