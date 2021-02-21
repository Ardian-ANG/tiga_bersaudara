<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\Ukuran;
use App\Models\PemesananModel;
use App\Models\penggunaModel;
use App\Models\template_produkModel;

class Pages extends BaseController
{
    protected $Produk;
    protected $Kategori;
    protected $Pemesanan;
    protected $Ukuran;
    protected $Pengguna;
    protected $Template;
    protected $session;

    public function __construct()
    {
        $this->Produk = new ProdukModel();
        $this->Kategori = new KategoriModel();
        $this->Pemesanan = new PemesananModel();
        $this->Ukuran = new Ukuran();
        $this->Pengguna = new penggunaModel();
        $this->Template = new template_produkModel();

        $this->session = session();
    }

    public function index($kategori = null)
    {
        if ($kategori) {
            $produk = $this->Produk->where('id_kategori', $kategori)->find();
        } else {
            $produk = $this->Produk->findAll(8);
        }
        $data = [
            'title' => 'Tiga Bersaudara',
            'produk' => $produk,
            'kategori' => $this->Kategori->findAll(),
            'session' => $this->session->get('role')

        ];
        return view('pages/home', $data);
    }


    // public function cari($Kategori)
    // {
    //     $data = [
    //         'title' => 'Tiga Bersaudara',
    //         'produk' => $this->Produk->where('id_kategori', $Kategori)->find(),
    //         'kategori' => $this->Kategori->findAll(),
    //         'session' => $this->session->get('role')

    //     ];
    //     // dd($data);
    //     return view('pages/home', $data);
    // }


    public function produk($id_produk)
    {
        // $session = session();
        $ukuran = new \App\Models\Ukuran();
        $data = [
            'title' => 'Produk',
            'produk' => $this->Produk->getDetailProduk($id_produk),
            'ukuran' => $ukuran->where('produk_id', $id_produk)->find(),
            'template' => $this->Template->where('id_produk', $id_produk)->find(),
            'session' => $this->session->get('role')

        ];

        // dd($data);
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
            'pemesanan' => $this->Pemesanan->pemesananUser()

        ];

        return view('pages/keranjang', $data);
    }
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
            'pemesanan' => $this->Pemesanan->detail_pembayaran($id_produk),
            'session' => $this->session->get('role')
        ];

        return view('pages/detail_pembayaran', $data);
    }
    public function shopNow()
    {
        // dd(date("Y/m/d"));
        if (empty($this->session->get('role'))) {
            return redirect()->to('/pages/login');
        }

        // ambil gambar
        $fileGambar = $this->request->getFile('desain');
        // apakah tidak ada gambar yang diupload
        if ($fileGambar->getError() == 4) {
            $namaGambar = '';
        } else {

            // generate nama gambar random
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan file ke gambar
            $fileGambar->move('custom_desain', $namaGambar);
        }
        // dd($this->request->getVar(), $namaGambar);

        if ($this->request->getVar('ukuran')) {
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
            // $ket_pemesanan = $ukuran . '/' . $harga . ' * ' . $this->request->getVar('jumlah') . ' (jumlah) = ' . $harga * $this->request->getVar('jumlah') . " " . $this->request->getVar('deskripsi');
            $jumlah = $harga * $this->request->getVar('jumlah');
            $ket_pemesanan = $harga . " x " . $this->request->getVar('jumlah') . "= " . $jumlah . " - " . "Ukuran = " . $ukuran . " - " . $this->request->getVar('deskripsi');
        } else {
            $pemesanan = $this->Produk->find($this->request->getVar('id_produk'));
            // dd($pemesanan['harga'], $this->request->getVar('id_produk'));
            $jumlah = $this->request->getVar('jumlah') * $pemesanan['harga'];
            $ket_pemesanan = $pemesanan['harga'] . " x " . $this->request->getVar('jumlah') . "= " . $jumlah . " - " . $this->request->getVar('deskripsi');
        }

        $session = session();
        $pemesanan = [
            'id_user' => $session->get('id_user'),
            'id_produk' => $this->request->getVar('id_produk'),
            'desain' => $namaGambar,
            'ket_pemesanan' => $ket_pemesanan,
            'biaya_tambahan' => 0,
            'pembayaran' => $this->request->getVar('pembayaran'),
            'status_pemesanan' => 'Dalam Antrian',
            'status_pembayaran' => 'Belum Dibayar',
            'bukti_pembayaran' => '',
            'tgl' => date("Y/m/d")
        ];
        $this->Pemesanan->save($pemesanan);
        return redirect()->to('/pages/keranjang/');
    }

    public function delete_pemesanan($id_pemesanan)
    {
        $pemesanan = $this->Pemesanan->find($id_pemesanan);

        // cek gambar default.jpg
        if ($pemesanan['desain']) {

            // hapus gambar
            unlink('custom_desain/' . $pemesanan['desain']);
        }


        $this->Pemesanan->delete($id_pemesanan);
        session()->setflashdata('pesan', 'Produk berhasil dihapus.');
        return redirect()->to('/pages/keranjang');
    }

    public function upload_bukti($id)
    {
        // ambil gambar
        $pemesanan = $this->Pemesanan->find($id);

        // cek gambar default.jpg
        if ($pemesanan['bukti_pembayaran'] != '') {

            // hapus gambar
            unlink('pembayaran/' . $pemesanan['bukti_pembayaran']);
        }

        $fileGambar = $this->request->getFile('bukti');
        // apakah tidak ada gambar yang diupload
        if ($fileGambar->getError() == 4) {
            $namaGambar = '';
        } else {

            // generate nama gambar random
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan file ke gambar
            $fileGambar->move('pembayaran', $namaGambar);
        }

        $this->Pemesanan->update($id, ['bukti_pembayaran' => $namaGambar]);
        return redirect()->to('/pages/detail_pembayaran/' . $id);
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
                $pengguna = [
                    'role' => $data['hak_akses'],
                    'pengguna' => $data,
                    'id_user' => $data['id_user'],
                    'logged_in' => true
                ];
                $session->set($pengguna);
                return redirect()->to('/pages');
            } else {
                echo "Email atau Password SALAH...!!!";
            }
        }

        // if (!$this->validate([
        //     'email' => [
        //         'rules' => 'required[pengguna.email]',
        //         'errors' => [
        //             'required' => 'email harus diisi.',
        //         ]
        //     ],
        // ])) {
        //     return redirect()->to('/pages/login');
        // }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/pages');
    }

    /**
     * Fungsi Untuk Print Laporan
     * 
     */

    function Print_Laporan()
    {
        $data = [
            'title' => 'Tiga Bersaudara',
            'produk' => $this->Produk->laporanProduk()
        ];
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('laporan/produk', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
        // dd($data);
    }
}
