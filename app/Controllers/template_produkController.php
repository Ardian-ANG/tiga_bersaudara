<?php

namespace App\Controllers;

use App\Models\template_produkModel;
use App\Models\ProdukModel;

class template_produkController extends BaseController
{
    protected $template_produk;
    protected $Produk;

    public function __construct()
    {
        $this->template_produk = new template_produkModel();
        $this->Produk = new ProdukModel();
    }

    public function save()
    {
        // ambil gambar
        $fileGambar = $this->request->getFile('img');
        // apakah tidak ada gambar yang diupload
        if ($fileGambar->getError() == 4) {
            $namaGambar = '';
        } else {

            // generate nama gambar random
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan file ke gambar
            $fileGambar->move('template_produk', $namaGambar);
        }
        $this->template_produk->save([
            "id_produk" => $this->request->getVar("id_produk"),
            "img" => $namaGambar,
            "title_template" => $this->request->getVar("title_template"),

        ]);
        session()->setflashdata("pesan", "template_produk berhasil ditambahkan.");
        return redirect()->to("/produk/edit/" . $this->request->getVar("id_produk"));
    }

    public function delete($id, $id_produk)
    {
        // cari gambar berdaasarkan id
        $template_produk = $this->template_produk->find($id);
        // cek gambar default.jpg
        if ($template_produk['img']) {
            unlink('template_produk/' . $template_produk['img']);
        }
        $this->template_produk->delete($id);
        return redirect()->to("/produk/edit/" . $id_produk);
    }
}
