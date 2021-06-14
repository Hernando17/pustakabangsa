<?php namespace App\Models;

use CodeIgniter\Model;

class offlineModel extends Model
{
    protected $table      = 'offline';
    protected $useTimestamps = true;
    protected $allowedFields = ['sampul', 'judul', 'penulis', 'penerbit', 'slug', 'isi', 'genre', 'deskripsi','kode','isbn','tglpenerbitan','stock'];

    public function getOffline($slug = false)
    {
        if($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}