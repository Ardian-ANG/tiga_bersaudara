<?php

namespace App\Models;

use CodeIgniter\Model;

class ukuranModel extends Model
{
    protected $table      = "ukuran";
    protected $primaryKey = "id";
    protected $allowedFields = ["id", "produk_id", "ukuran", "harga", ];

    public function ukuran()
    {
        return $this->db->table('ukuran')
            ->join('produk', 'produk.id_produk=ukuran.produk_id')
            ->select('produk.nama_produk, ukuran.*')
            ->get()->getResultArray();
    }
}
