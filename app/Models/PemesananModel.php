<?php

namespace App\Models;

use Codeigniter\Model;

class PemesananModel extends Model
{
    protected $table      = 'pemesanan';
    protected $allowedFields = ['id_user', 'id_produk', 'desain', 'ket_pemesanan', 'pembayaran', 'status_pemesanan', 'status_pembayaran', 'bukti_pembayaran', 'tgl'];


    public function pemesananUser()
    {
        $session = session();
        return $this->db->table('pemesanan')
            ->join('produk', 'produk.id_produk=pemesanan.id_produk')
            ->join('pengguna', 'pengguna.id_user=pemesanan.id_user')
            ->where('pengguna.id_user', $session->get('id_user'))
            ->get()->getResultArray();
    }
    public function pemesanan()
    {
        return $this->db->table('pemesanan')
            ->join('produk', 'produk.id_produk=pemesanan.id_produk')
            ->join('pengguna', 'pengguna.id_user=pemesanan.id_user')
            ->get()->getResultArray();
    }
}
