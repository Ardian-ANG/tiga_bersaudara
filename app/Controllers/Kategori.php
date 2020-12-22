<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\ProdukModel;
use KategoriModel as GlobalKategoriModel;

class Kategori extends BaseController
{
    protected $Produk;
    protected $Kategori;

    public function __construct()
    {
        $this->Produk = new ProdukModel();
        $this->Kategori = new KategoriModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Kategori Produk',
            'kategori' => $this->Kategori->getKategori()
        ];
        return view('pages/kategori/kategori', $data);
    }


    public function create()
    {
        $data = [
            'title' => 'Form Tamabah Data Kategori',
            'produk' => $this->Produk->getProduk(),
            'validation' => \Config\Services::validation()
        ];

        return view('pages/kategori/tambah', $data);
    }


    public function save()
    {
        //  validasi input
        if (!$this->validate([
            'kategori' => [
                'rules' => 'required|is_unique[kategori.kategori]',
                'errors' => [
                    'required' => 'kategori harus diisi.',
                    'is_unique' => 'kategori sudah ada'
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/kategori/create')->withInput()->with('validation', $validation);
        }

        $this->Kategori->save([
            'kategori' => $this->request->getVar('kategori')
        ]);
        session()->setflashdata('pesan', 'Kategori berhasil ditambahkan.');


        return redirect()->to('/kategori');
    }

    public function delete($id_kategori)
    {
        $this->Kategori->delete($id_kategori);
        session()->setflashdata('pesan', 'Kategori berhasil dihapus.');
        return redirect()->to('/kategori');
    }


    public function edit($id_kategori)
    {

        $data = [
            'title' => 'Form Ubah Kategori',
            'validation' => \Config\Services::validation(),
            'kategori' => $this->Kategori->getKategori($id_kategori)
        ];
        return view('pages/kategori/ubah', $data);
    }

    public function update($id_kategori)
    {
        if (!$this->validate([
            'kategori' => [
                'rules' => 'required[kategori.kategori]',
                'errors' => [
                    'required' => 'kategori harus diisi.'
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/kategori/edit/' . $id_kategori)->withInput()->with('validation', $validation);
        }

        $this->Kategori->save([
            'id_kategori' => $id_kategori,
            'kategori' => $this->request->getVar('kategori')
        ]);
        session()->setflashdata('pesan', 'Kategori berhasil diubah.');


        return redirect()->to('/kategori');
    }
}
