<?php namespace App\Models;

use CodeIgniter\Model;

class bukuModel extends Model
{
    protected $table      = 'buku';
    protected $useTimestamps = true;
    protected $allowedFields = ['sampul', 'judul', 'penulis', 'penerbit', 'slug', 'deskripsi', 'isi', 'genre','isbn','penerbitan'];

    public function getBuku($slug = false)
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

        return $this->table('buku')->like('judul', $keyword)->orLike('penulis', $keyword)->orLike('penerbit', $keyword)->orLike('id', $keyword)->orLike('genre', $keyword)->orLike('isbn', $keyword)->orLike('penerbitan', $keyword);
    }
}