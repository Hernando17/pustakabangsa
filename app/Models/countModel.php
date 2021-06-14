<?php

namespace App\Models;

use CodeIgniter\Model;

class countModel extends Model
{
    public function tot_book()
    {
        return $this->db->table('offline')->countAll();
    }
    public function tot_ebook()
    {
        return $this->db->table('buku')->countAll();
    }
    public function tot_admin()
    {
        return $this->db->table('akun_admin')->countAll();
    }
    public function tot_pustaka()
    {
        return $this->db->table('pustakawan')->countAll();
    }
}
