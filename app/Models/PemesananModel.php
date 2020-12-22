<?php

namespace App\Models;

use Codeigniter\Model;

class PemesananModel extends Model
{
    protected $table      = 'pemesanan';
    protected $allowedFields = ['id_user', 'id_produk', 'desain', 'ket_pemesanan', 'pembayaran', 'status_pemesanan', 'status_pembayaran', 'bukti_pembayaran', 'tgl'];


    public function pemesanan()
    {
        return $this->db->table('pemesanan')
            ->join('produk', 'produk.id_produk=pemesanan.id_produk')
            ->join('user', 'user.id_user=pemesanan.id_user')
            ->get()->getResultArray();
    }
}
