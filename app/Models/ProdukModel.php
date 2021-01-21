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

    // public function getUser($id)
    // {
    //     return $this->db->table('users')
    //         ->join('coba', 'coba.id_user=users.id')
    //         ->where('users.id=' . $id)
    //         ->get()->getResultArray();
    // }

    public function getTemplate($id_produk)
    {
        return $this->db->table('template')
            ->join('produk', 'produk.id_produk=template.id_produk')
            ->where('template.id_produk=' . $id_produk);
    }


    public function laporanProduk()
    {
        return $this->db->table('produk')
            ->join('pemesanan', 'pemesanan.id_produk=produk.id_produk')
            ->join('pengguna', 'pengguna.id_user=pemesanan.id_user')
            ->where('pemesanan.status_pemesanan', 'Sudah Selesai')
            ->get()->getResultArray();
    }
}
