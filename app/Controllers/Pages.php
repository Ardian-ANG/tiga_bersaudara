<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\Ukuran;
use App\Models\PemesananModel;
use App\Models\penggunaModel;


class Pages extends BaseController
{
    protected $Produk;
    protected $Kategori;
    protected $Pemesanan;
    protected $Ukuran;
    protected $Pengguna;
    protected $session;

    public function __construct()
    {
        $this->Produk = new ProdukModel();
        $this->Kategori = new KategoriModel();
        $this->Pemesanan = new PemesananModel();
        $this->Ukuran = new Ukuran();
        $this->Pengguna = new penggunaModel();

        $this->session = session();
    }

    public function index()
    {
        $data = [
            'title' => 'Tiga Bersaudara',
            'produk' => $this->Produk->getProduk(),
            'kategori' => $this->Kategori->findAll(),
            'session' => $this->session->get('role')

        ];
        return view('pages/home', $data);
    }
    public function cari($Kategori)
    {
        $data = [
            'title' => 'Tiga Bersaudara',
            'produk' => $this->Produk->where('id_kategori', $Kategori)->find(),
            'kategori' => $this->Kategori->findAll(),
            'session' => $this->session->get('role')

        ];
        // dd($data);
        return view('pages/home', $data);
    }


    public function produk($id_produk)
    {
        // $session = session();
        $ukuran = new \App\Models\Ukuran();
        $data = [
            'title' => 'Produk',
            'produk' => $this->Produk->getDetailProduk($id_produk),
            'ukuran' => $ukuran->where('produk_id', $id_produk)->findAll(),
            'session' => $this->session->get('role')

        ];
        return view('pages/produk', $data);
    }

    public function kategori()
    {
        $data = [
            'title' => 'kategori',
            'session' => $this->session->get('role')

        ];

        return view('pages/kategori', $data);
    }
    public function keranjang()
    {
        $data = [
            'title' => 'keranjang',
            'session' => $this->session->get('role'),
            'pemesanan' => $this->Pemesanan->pemesanan()

        ];

        return view('pages/keranjang', $data);
    }

    // public function checkout()
    // {
    //     $data = [
    //         'title' => 'checkout',
    //         'session' => $this->session->get('role')

    //     ];

    //     return view('pages/checkout', $data);
    // }
    // public function kontak()
    // {
    //     $data = [
    //         'title' => 'kontak',
    //         'session' => $this->session->get('role')

    //     ];

    //     return view('pages/kontak', $data);
    // }
    public function register()
    {
        $data = [
            'title' => 'register',
            'validation' => \Config\Services::validation(),


        ];

        return view('pages/register', $data);
    }


    public function detail_pembayaran($id_produk)
    {
        $data = [
            'title' => 'detail_pembayaran',
            // 'produk' => $this->Produk->getDetailProduk($id_produk),
            'pemesanan' => $this->Pemesanan->pemesanan(),
            'session' => $this->session->get('role')
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
        $session = session();
        $pemesanan = [
            'id_user' => $session->get('id_user'),
            'id_produk' => $this->request->getVar('id_produk'),
            'desain' => $this->request->getVar('desain'),
            'ket_pemesanan' => $ukuran . '/' . $harga . ' * ' . $this->request->getVar('jumlah') . ' (jumlah) = ' . $harga * $this->request->getVar('jumlah') . " " . $this->request->getVar('deskripsi'),
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

    public function login()
    {
        $data = [
            'title' => 'login'
        ];

        return view('pages/login', $data);
    }

    public function verifikasi()
    {

        $session = session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $this->Pengguna->where('email', $username)->first();

        if ($data) {
            $verify_pass = password_verify($password, $data['password']);
            if ($verify_pass) {
                // echo "berhasil";
                $pengguna = [
                    'role' => $data['hak_akses'],
                    'pengguna' => $data,
                    'id_user' => $data['id_user'],
                    'logged_in' => true
                ];
                $session->set($pengguna);
                return redirect()->to('/pages');
            } else {
                echo "Gagall bosss";
            }
        }
        // dd($data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/pages');
    }
}
