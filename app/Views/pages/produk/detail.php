<?= $this->extend('admin/index'); ?>

<?= $this->Section('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h2>Detail Produk</h2>
            <div class="card" style="width: 18rem;">
                <img src="/gambar/<?= $produk[0]['gambar']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $produk[0]['nama_produk']; ?></h5>
                    <p class="card-text"><?= $produk[0]['keterangan']; ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Kategori :</b><?= $produk[0]['kategori']; ?></li>
                    <li class="list-group-item"><b>Harga :</b><?= $produk[0]['harga']; ?></li>
                    <li class="list-group-item"><b>Waktu Pembuatan : </b><?= $produk[0]['estimasi_waktu']; ?></li>
                </ul>
                <div class="card-body">
                    <a href="/produk" class="card-link">Kembali ke daftar Produk</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>