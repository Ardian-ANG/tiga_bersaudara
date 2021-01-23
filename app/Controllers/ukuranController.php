<?php

namespace App\Controllers;

use App\Models\ukuranModel;
use App\Models\ProdukModel;

class ukuranController extends BaseController
{
    protected $ukuran;
    protected $Produk;

    public function __construct()
    {
        $this->ukuran = new ukuranModel();
        $this->Produk = new ProdukModel();
    }

    public function save()
    {
        $this->ukuran->save([
            "produk_id" => $this->request->getVar("produk_id"),
            "ukuran" => $this->request->getVar("ukuran"),
            "harga" => $this->request->getVar("harga"),

        ]);
        session()->setflashdata("pesan", "ukuran berhasil ditambahkan.");
        return redirect()->to("/produk/edit/" . $this->request->getVar("produk_id"));
    }


    public function delete($id, $id_produk)
    {
        $this->ukuran->delete($id);
        return redirect()->to("/produk/edit/" . $id_produk);
    }

}
