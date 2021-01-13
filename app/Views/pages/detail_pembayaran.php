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
                <p>Total Harga : Rp. <?php echo $explode[7]; ?> </p>
                <p> Minamal yang dibayar (Uang Muka): Rp. <?php echo $explode[7] / 2; ?> </p>


                <form action="/pages/keranjang" method="post">
                    <input type="hidden" value="" name="id_produk">
                    <div class="row">
                        <div class="form-group col-2">
                            <label for="exampleFormControlFile1">Upload Bukti Transfer</label>
                        </div>
                        <div class="form-group col-2">
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="desain">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-2">
                            <label for="exampleFormControlFile1">Catatan</label>
                        </div>
                        <div class="form-group ">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" cols="45" name="deskripsi"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ml-4">Keranjang</button>

                </form>
                <!-- <?php $i = 1; ?>
                            <?php foreach ($pemesanan as $p) : ?>
                                
                            <?php endforeach; ?> -->
            </div>
        </div>
    </div>
</section>



<?= $this->endSection(); ?>