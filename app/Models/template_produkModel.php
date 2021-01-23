<?php

namespace App\Models;

use CodeIgniter\Model;

class template_produkModel extends Model
{
    protected $table      = "template_produk";
    protected $primaryKey = "id";
    protected $allowedFields = ["id", "id_produk", "img", "title_template", ];

    public function Produk()
    {
        return $this->db->table('template_produk')
            ->join('produk', 'produk.id_produk=template_produk.id_produk')
            ->select('produk.nama_produk, template_produk.*')
            ->get()->getResultArray();
    }
}
