<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\Ukuran;
use App\Models\PemesananModel;
use KategoriModel as GlobalKategoriModel;

class Pemesanan extends BaseController
{
    protected $Produk;
    protected $Kategori;
    protected $Pemesanan;

    public function __construct()
    {
        $this->Produk = new ProdukModel();
        $this->Kategori = new KategoriModel();
        $this->Pemesanan = new PemesananModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Pemesanan dan Pembayaran',
            'pemesanan' => $this->Pemesanan->pemesanan()
        ];

        return view('admin/pemesanan', $data);
    }

    public function delete($id_produk)
    {
        $this->Produk->delete($id_produk);
        session()->setflashdata('pesan', 'Produk berhasil dihapus.');
        return redirect()->to('/pemesanan');
    }

    public function edit($id_produk)
    {

        $data = [
            'title' => 'Form Ubah Data Pesanan',
            'validation' => \Config\Services::validation(),
            'produk' => $this->Produk->getProduk($id_produk)
        ];
        return view('admin/ubah_pemesanan', $data);
    }

    public function update($id_produk)
    {
        if (!$this->validate([
            'nama_produk' => [
                'rules' => 'required[produk.nama_produk]',
                'errors' => [
                    'required' => 'produk harus diisi.',

                ]
            ],
            'id_kategori' => [
                'rules' => 'required[produk.id_kategori]',
                'errors' => [
                    'required' => 'kategori harus dipilih.'
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
            $validation = \Config\Services::validation();
            return redirect()->to('/pemesanan/edit/' . $id_produk)->withInput()->with('validation', $validation);
        }

        $this->Produk->save([
            'id_produk' => $id_produk,
            'nama_produk' => $this->request->getVar('nama_produk'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'gambar' => $this->request->getVar('gambar'),
            'harga' => $this->request->getVar('harga'),
            'keterangan' => $this->request->getVar('keterangan'),
            'estimasi_waktu' => $this->request->getVar('estimasi_waktu')
        ]);
        session()->setflashdata('pesan', 'Produk berhasil diubah.');


        return redirect()->to('/pemesanan');
    }
}
