<?= $this->extend('layout/template'); ?>

<?= $this->Section('content'); ?>
<!-- Page info -->
<div class="page-top-info">
    <div class="container">
        <h4>Keterangan Produk</h4>
        <div class="site-pagination">
            <a href="">Home</a> /
            <a href="">Shop</a>
        </div>
    </div>
</div>
<!-- Page info end -->


<!-- product section -->
<section class="product-section">
    <div class="container">
        <div class="back-link">
            <a href="./category.html"> &lt;&lt; Back to Category</a>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="product-pic-zoom">
                    <img class="product-big-img" src="/gambar/<?= $produk[0]['gambar']; ?>" alt="">
                </div>
                <!-- <div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
                    <div class="product-thumbs-track">
                        <div class="pt active" data-imgbigurl="img/single-product/1.jpg"><img src="img/single-product/thumb-1.jpg" alt=""></div>
                        <div class="pt" data-imgbigurl="img/single-product/2.jpg"><img src="img/single-product/thumb-2.jpg" alt=""></div>
                        <div class="pt" data-imgbigurl="img/single-product/3.jpg"><img src="img/single-product/thumb-3.jpg" alt=""></div>
                        <div class="pt" data-imgbigurl="img/single-product/4.jpg"><img src="img/single-product/thumb-4.jpg" alt=""></div>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-6 product-details">
                <h2 class="p-title"><?= $produk[0]['nama_produk']; ?></h2>
                <h3 class="p-price">Rp. <?= $produk[0]['harga']; ?></h3>

                <p><?= $produk[0]['keterangan']; ?></p>



                <form action="/pages/shopNow" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $produk[0]['id_produk']; ?>" name="id_produk">
                    <div class="row mt-5">
                        <div class="form-group col-2 ">
                            <label for="pembayaran">Pilih Pembayaran</label>
                        </div>
                        <div class="form-group col-5">
                            <select class="form-control" id="pembayaran" name="pembayaran">
                                <option value="COD">COD</option>
                                <option value="transfer">Transfer</option>
                            </select>
                        </div>
                    </div>
                    <?php if($ukuran != null){ ?>
                    
                    <div class="row mt-5">
                        <div class="form-group col-2 ">
                            <label for="exampleFormControlSelect1">Pilih Ukuran</label>
                        </div>
                        <div class="form-group col-5">
                            <select class="form-control ukuran" id="exampleFormControlSelect1" name="ukuran">
                                <?php foreach ($ukuran as $p) : ?>
                                    <option value="<?= $p['ukuran']; ?>"><?= $p['ukuran']; ?></option>
                                <?php endforeach ?>
                                <option value="custom">custom</option>
                            </select>
                        </div>
                        <div class="ukuran"></div>
                    </div>
                    <?php } ?>
                    <div class="quantity">
                        <p>Jumlah</p>
                        <div class="pro-qty ml-4"><input type="text" value="1" name="jumlah"></div>
                    </div>

                    <div class="row">
                        <div class="form-group col-2">
                            <label for="exampleFormControlFile1">Upload Desain</label>
                        </div>
                        <div class="form-group col-2">
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="desain">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-2">
                            <label for="exampleFormControlFile1">Deskripsi</label>
                        </div>
                        <div class="form-group ">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" cols="45" name="deskripsi"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ml-4">Shop Now</button>

                </form>
            </div>
        </div>
    </div>
</section>
<!-- product section end -->


<!-- RELATED PRODUCTS section -->
<div class="container mb-3">
    <div class="">
        <a data-fancybox="gallery" href="/gambar/<?= $produk[0]['gambar']; ?>"><img src="/gambar/<?= $produk[0]['gambar']; ?>" style="width: auto; height: 200px; "></a>
        <a data-fancybox="gallery" href="/gambar/<?= $produk[0]['gambar']; ?>"><img src="/gambar/<?= $produk[0]['gambar']; ?>" style="width: auto; height: 200px; "></a>
    </div>
</div>
<!-- RELATED PRODUCTS section end -->
<?= $this->endSection(); ?>