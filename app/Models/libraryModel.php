<?php

namespace App\Models;

use CodeIgniter\Model;

class libraryModel extends Model
{
    protected $table      = 'offline';
    protected $useTimestamps = true;
    protected $allowedFields = ['sampul', 'judul', 'penulis', 'penerbit', 'slug', 'genre', 'deskripsi', 'kode', 'isbn', 'tglpenerbitan', 'stock'];

    public function getLibrary()
    {
        return $this->findAll();
    }

    public function search($keyword)
    {
        // $builder = $this->table('buku');
        // $builder->like('ebook', $keyword);
        // return $builder;

        return $this->table('offline')->like('judul', $keyword)->orLike('penulis', $keyword)->orLike('penerbit', $keyword)->orLike('id', $keyword)->orLike('genre', $keyword)->orLike('kode', $keyword)->orLike('tglpenerbitan', $keyword)->orLike('isbn', $keyword)->orLike('stock', $keyword);
    }
}
