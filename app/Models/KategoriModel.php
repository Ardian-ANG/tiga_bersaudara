<?php

namespace App\Models;

use Codeigniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['id_kategori', 'kategori'];


    public function getKategori($id_kategori = false)
    {
        if ($id_kategori == false) {
            return $this->findAll();
        }

        return $this->where(['id_kategori' => $id_kategori])->first();
    }
}
