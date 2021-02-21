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
// dd($data);
        return view('admin/pemesanan', $data);
    }

    public function delete($id)
    {
        $this->Pemesanan->delete($id);
        session()->setflashdata('pesan', 'Produk berhasil dihapus.');
        return redirect()->to('/pemesanan');
    }

    public function edit($id)
    {
        $pemesanan = $this->Pemesanan->find($id);
        $data = [
            'title' => 'Form Ubah Data Pesanan',
            'validation' => \Config\Services::validation(),
            'nama_produk' => $this->Produk->find($pemesanan['id_produk']),
            'pemesanan' => $pemesanan
        ];
        // dd($data);
        return view('admin/ubah_pemesanan', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'biaya_tambahan' => [
                'rules' => 'required[pemesanan.biaya_tambahan]',
                'errors' => [
                    'required' => 'harus diisi.',

                ]
            ],
            'status_pemesanan' => [
                'rules' => 'required[pemesanan.status_pemesanan]',
                'errors' => [
                    'required' => 'harus diisi.',

                ]
            ],
            'status_pembayaran' => [
                'rules' => 'required[pemesanan.status_pembayaran]',
                'errors' => [
                    'required' => 'harus dipilih.'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/pemesanan/edit/' . $id)->withInput()->with('validation', $validation);
        }
        // dd($this->request->getVar());
        $db      = \Config\Database::connect();
        $builder = $db->table('Pemesanan');
        $data = [
            'biaya_tambahan' => $this->request->getVar('biaya_tambahan'),
            'status_pemesanan' => $this->request->getVar('status_pemesanan'),
            'status_pembayaran' => $this->request->getVar('status_pembayaran')
        ];
        $builder->set($data);
        $builder->where('id', $id);
        $builder->update();
        session()->setflashdata('pesan', 'Pemesanan berhasil diubah.');

        return redirect()->to('/pemesanan');
    }
}
