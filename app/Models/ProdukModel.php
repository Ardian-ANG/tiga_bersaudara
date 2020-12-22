<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = ['nama_produk', 'id_kategori', 'gambar', 'harga', 'keterangan', 'estimasi_waktu'];

    public function getProduk($id_produk = false)
    {
        if ($id_produk == false) {
            return $this->findAll();
        }

        return $this->where(['id_produk' => $id_produk])->first();
    }

    public function getDetailProduk($id_produk)
    {
        return $this->db->table('produk')
            ->join('kategori', 'kategori.id_kategori=produk.id_kategori')
            // ->join('ukuran', 'ukuran.produk_id=produk.id_produk')
            ->where('produk.id_produk=' . $id_produk)
            ->get()->getResultArray();
    }

    public function getSize($id_produk)
    {
        return $this->db->table('ukuran')
                ->where('produk_id', 89);
    }
}