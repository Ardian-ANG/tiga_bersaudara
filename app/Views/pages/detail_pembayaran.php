<?= $this->extend('layout/template'); ?>

<?= $this->Section('content'); ?>

<div class="page-top-info">
    <div class="container">
        <h4>Detail Pembayaran</h4>
        <div class="site-pagination">
            <h4><?= $pemesanan[0]['nama_produk']; ?></h4>
        </div>
    </div>
</div>

<!-- Page info -->
<section class="product-section">
    <div class="container">
        <div class="row">

            <div class=" product-details">
                <h3 class="p-title">Transfer</h3>
                <p>Bank : BNI</p>
                <p>Nomor Rekening : 0722624859</p>
                <p>Atas Nama : Syamsul Aufa</p>
                <h3 class="p-price">Cash On Delivery (COD)</h3>
                <p>Alamat : Jl. Ahmad Yani, Lekong Dendek Dasan Tereng, Narmada.</p>
                <p>Hubungi : +62878-5677-8689</p>
                <h4>Info Produk</h4>
                <p></p>
                <?php $explode = explode(" ", $pemesanan[0]['ket_pemesanan']); ?>
                <p><?= $pemesanan[0]['ket_pemesanan']; ?></p>
                <p>Status Pemesanan : <?= $pemesanan[0]['status_pemesanan']; ?></p>
                <p>Total Harga : Rp. <?= $explode[3]; ?> </p>
                <p>Total Transfer : Rp. <?= $explode[3] / 2; ?> </p>


                <form action="/pages/upload_bukti/<?= $pemesanan[0]['id']; ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-2">
                            <label for="exampleFormControlFile1">Upload Bukti Transfer</label>
                        </div>
                        <div class="form-group col-2">
                            <input required type="file" class="form-control-file" id="exampleFormControlFile1" name="bukti">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-4 mb-2">upload</button>

                </form>
                    <a href="/pages/keranjang">
                        <button class="btn btn-info">Keranjang</button>
                    </a>
            </div>
        </div>
    </div>
</section>



<?= $this->endSection(); ?>