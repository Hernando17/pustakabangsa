<?php namespace App\Models;

use CodeIgniter\Model;

class organisasi2Model extends Model
{
    protected $table      = 'organisasi';
    protected $useTimestamps = true;
    protected $allowedFields = ['foto', 'nama', 'slug'];

    public function getOrganisasi2()
    {
        return $this->findAll();
    }
}