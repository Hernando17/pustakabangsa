<?php namespace App\Models;

use CodeIgniter\Model;

class pustakaModel extends Model
{
    protected $table      = 'pustakawan';
    protected $useTimestamps = true;
    protected $allowedFields = ['foto', 'username', 'jabatan', 'twitter', 'instagram', 'facebook', 'slug'];

    public function getPustaka()
    {
        return $this->findAll();
    }
}