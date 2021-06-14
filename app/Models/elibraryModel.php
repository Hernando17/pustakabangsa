<?php namespace App\Models;

use CodeIgniter\Model;

class elibraryModel extends Model
{
    protected $table      = 'buku';
    protected $useTimestamps = true;
    protected $allowedFields = ['sampul', 'judul', 'penulis', 'penerbit', 'slug', 'isi', 'genre', 'deskripsi','isbn','penerbitan'];

    public function geteLibrary()
    {
        return $this->findAll();
    }

    public function search($keyword)
    {
        // $builder = $this->table('buku');
        // $builder->like('ebook', $keyword);
        // return $builder;

        return $this->table('buku')->like('judul', $keyword)->orLike('penulis', $keyword)->orLike('penerbit', $keyword)->orLike('id', $keyword)->orLike('genre', $keyword)->orLike('isbn', $keyword)->orLike('penerbitan', $keyword);
    }
}