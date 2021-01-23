<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\template_produkModel;
use App\Models\ukuranModel;


class Produk extends BaseController
{
    protected $Produk;
    protected $Kategori;
    protected $session;
    protected $Template;
    protected $Ukuran;



    public function __construct()
    {
        $this->Produk = new ProdukModel();
        $this->Kategori = new KategoriModel();
        $this->template_produk = new template_produkModel();
        $this->Ukuran = new ukuranModel();
        $this->session = session();
    }


    public function index()
    {
        $session = session();
        if ($session->get('role') == 'user') {
            return redirect()->to('/pages');
        }
        // $this->CekLogin();
        $data = [
            'title' => 'Halaman Produk',
            'produk' => $this->Produk->getProduk(),
            'session' => $this->session->get('role')

        ];
        return view('pages/produk/produk', $data);
    }

    public function detail($id_produk)
    {
        $session = session();
        if ($session->get('role') == 'user') {
            return redirect()->to('/pages');
        }

        $data = [
            'title' => 'Detail Produk',
            'produk' => $this->Produk->getDetailProduk($id_produk),
            'session' => $this->session->get('role')

        ];
        return view('pages/produk/detail', $data);
    }


    public function create()
    {
        $session = session();
        if ($session->get('role') == 'user') {
            return redirect()->to('/pages');
        }
        $data = [
            'title' => 'Form Tamabah Data produk',
            'kategori' => $this->Kategori->getKategori(),
            'validation' => \Config\Services::validation(),
            'session' => $this->session->get('role')

        ];

        return view('pages/produk/tambah', $data);
    }

    public function save()
    {
        //  validasi input
        if (!$this->validate([
            'nama_produk' => [
                'rules' => 'required|is_unique[produk.nama_produk]',
                'errors' => [
                    'required' => 'produk harus diisi.',
                    'is_unique' => 'produk sudah ada'
                ]
            ],
            'id_kategori' => [
                'rules' => 'required[produk.id_kategori]',
                'errors' => [
                    'required' => 'kategori harus dipilih.'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,2024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]

            ],
            'harga' => [
                'rules' => 'required[produk.harga]',
                'errors' => [
                    'required' => 'harga harus diisi.'
                ]
            ],
            'keterangan' => [
                'rules' => 'required[produk.keterangan]',
                'errors' => [
                    'required' => 'keterangan harus diisi.'
                ]
            ],
            'estimasi_waktu' => [
                'rules' => 'required[produk.estimasi_waktu]',
                'errors' => [
                    'required' => 'waktu harus diisi.'
                ]
            ],

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/produk/create')->withInput()->with('validation', $validation);
            return redirect()->to('/produk/create')->withInput();
        }

        // ambil gambar
        $fileGambar = $this->request->getFile('gambar');
        // apakah tidak ada gambar yang diupload
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.jpg';
        } else {

            // generate nama gambar random
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan file ke gambar
            $fileGambar->move('gambar', $namaGambar);
        }



        $this->Produk->save([
            'nama_produk' => $this->request->getVar('nama_produk'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'gambar' => $namaGambar,
            'harga' => $this->request->getVar('harga'),
            'keterangan' => $this->request->getVar('keterangan'),
            'estimasi_waktu' => $this->request->getVar('estimasi_waktu')
        ]);
        session()->setflashdata('pesan', 'Produk berhasil ditambahkan.');


        return redirect()->to('/produk');
    }

    public function delete($id_produk)
    {

        // cari gambar berdaasarkan id
        $produk = $this->Produk->find($id_produk);

        // cek gambar default.jpg
        if ($produk['gambar'] != 'default.jpg') {

            // hapus gambar
            unlink('gambar/' . $produk['gambar']);
        }


        $this->Produk->delete($id_produk);
        session()->setflashdata('pesan', 'Produk berhasil dihapus.');
        return redirect()->to('/produk');
    }

    public function edit($id_produk)
    {

        $data = [
            'title' => 'Form Ubah Data produk',
            'kategori' => $this->Kategori->getKategori(),
            'ukuran' => $this->Ukuran->where("produk_id", $id_produk)->find(),
            'template_produk' => $this->template_produk->where("id_produk", $id_produk)->find(),
            'validation' => \Config\Services::validation(),
            'produk' => $this->Produk->getProduk($id_produk),
            'session' => $this->session->get('role')
        ];
        return view('pages/produk/ubah', $data);
    }

    public function update($id_produk)
    {
        // dd();
        // cek judul
        $produkLama = $this->Produk->getProduk($id_produk);
        if ($produkLama['nama_produk'] == $this->request->getVar('nama_produk')) {
            $rule_namaproduk = 'required';
        } else {
            $rule_namaproduk = 'required|is_unique[produk.nama_produk]';
        }

        if (!$this->validate([
            'nama_produk' => [
                'rules' => $rule_namaproduk,
                'errors' => [
                    'required' => 'produk harus diisi.',
                    'is_unique' => 'produk sudah ada'

                ]
            ],
            'id_kategori' => [
                'rules' => 'required[produk.id_kategori]',
                'errors' => [
                    'required' => 'kategori harus dipilih.'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,2024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]

            ],
            'harga' => [
                'rules' => 'required[produk.harga]',
                'errors' => [
                    'required' => 'harga harus diisi.'
                ]
            ],
            'keterangan' => [
                'rules' => 'required[produk.keterangan]',
                'errors' => [
                    'required' => 'keterangan harus diisi.'
                ]
            ],
            'estimasi_waktu' => [
                'rules' => 'required[produk.estimasi_waktu]',
                'errors' => [
                    'required' => 'waktu harus diisi.'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/produk/edit/' . $id_produk)->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');

        // cek gambar, apakah tetap gambar lama
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            // generate nama file random
            $namaGambar = $fileGambar->getRandomName();
            // upload gambar
            $fileGambar->move('gambar', $namaGambar);
            // hapus file lama
            unlink('gambar/' . $this->request->getVar('gambarLama'));
        }


        $this->Produk->save([
            'id_produk' => $id_produk,
            'nama_produk' => $this->request->getVar('nama_produk'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'gambar' => $namaGambar,
            'harga' => $this->request->getVar('harga'),
            'keterangan' => $this->request->getVar('keterangan'),
            'estimasi_waktu' => $this->request->getVar('estimasi_waktu')
        ]);
        session()->setflashdata('pesan', 'Produk berhasil diubah.');


        return redirect()->to('/produk');
    }

    public function CekLogin()
    {
        $session = session();
        if ($session->get('role') == 'user') {
            return redirect()->to('/pages');
        }
    }
}
