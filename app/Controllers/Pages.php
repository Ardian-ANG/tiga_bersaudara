<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\Ukuran;
use App\Models\PemesananModel;


class Pages extends BaseController
{
    protected $Produk;
    protected $Kategori;
    protected $Pemesanan;
    protected $Ukuran;

    public function __construct()
    {
        $this->Produk = new ProdukModel();
        $this->Kategori = new KategoriModel();
        $this->Pemesanan = new PemesananModel();
        $this->Ukuran = new Ukuran();
    }

    public function cekLogin()
    {
        $a = 0;
        if ($a()) {
            $is_admin = $this->Produk->getUser(1);

            if ($is_admin[0]['role'] == 'admin') {
            } elseif ($is_admin[0]['role'] == 'user') {
            }
        }
    }


    public function index()
    {
        // $this->cekLogin();
        $data = [
            'title' => 'Tiga Bersaudara',
            'produk' => $this->Produk->getProduk(),
            'kategori' => $this->Kategori->getKategori()
        ];

        return view('pages/home', $data);
    }

    public function produk($id_produk)
    {
        $ukuran = new \App\Models\Ukuran();
        $data = [
            'title' => 'produk',
            'produk' => $this->Produk->getDetailProduk($id_produk),
            'ukuran' => $ukuran->where('produk_id', $id_produk)->findAll()
        ];
        return view('pages/produk', $data);
    }

    public function kategori()
    {
        $data = [
            'title' => 'kategori'
        ];

        return view('pages/kategori', $data);
    }
    public function keranjang()
    {
        $data = [
            'title' => 'keranjang'
        ];

        return view('pages/keranjang', $data);
    }

    public function checkout()
    {
        $data = [
            'title' => 'checkout'
        ];

        return view('pages/checkout', $data);
    }
    public function kontak()
    {
        $data = [
            'title' => 'kontak'
        ];

        return view('pages/kontak', $data);
    }
    public function register()
    {
        $data = [
            'title' => 'register'
        ];

        return view('pages/register', $data);
    }
    public function login()
    {
        $data = [
            'title' => 'login'
        ];

        return view('pages/login', $data);
    }
    public function detail_pembayaran($id_produk)
    {
        $data = [
            'title' => 'detail_pembayaran',
            'pemesanan' => $this->Pemesanan->pemesanan()
        ];

        return view('pages/detail_pembayaran', $data);
    }
    public function shopNow()
    {

        $ukuran = $this->request->getVar('ukuran');
        $harga = "";
        if ($ukuran == "custom") {
            $ukuran1 = $this->request->getVar('ukuran1');
            $ukuran2 = $this->request->getVar('ukuran2');
            $acak = $ukuran1 . " x " . $ukuran2;
            $ukuran = $acak;

            $c = explode(" ", $ukuran);
            $c = implode(" ", array($c[2], $c[1], $c[0]));
            $c = $this->Ukuran->where('ukuran', $c)->find();

            $harga = $c[0]['harga'];
            // dd($harga, $ukuran);
        } else {
            $ukuran = $ukuran;
            $c = $this->Ukuran->where('ukuran', $ukuran)->find();

            $harga = $c[0]['harga'];
            // dd($harga, $ukuran);
        }

        $pemesanan = [
            'id_user' => 1,
            'id_produk' => $this->request->getVar('id_produk'),
            'desain' => $this->request->getVar('desain'),
            'ket_pemesanan' => $ukuran . '/' . $harga . ' * ' . $this->request->getVar('jumlah') . ' (jumlah) = ' . $harga * $this->request->getVar('jumlah') . $this->request->getVar('deskripsi'),
            'pembayaran' => $this->request->getVar('pembayaran'),
            'status_pemesanan' => 'Dalam Antrian',
            'status_pembayaran' => 'Belum Dibayar',
            'bukti_pembayaran' => '',
            'tgl' => date("Y/m/d")
        ];
        $this->Pemesanan->save($pemesanan);
        return redirect()->to('/pages/detail_pembayaran/' .  $this->request->getVar('id_produk'));
    }

    //--------------------------------------------------------------------

}
