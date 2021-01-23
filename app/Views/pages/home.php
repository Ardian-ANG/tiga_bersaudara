<?= $this->extend('layout/template'); ?>

<?= $this->Section('content'); ?>
<!-- Hero section -->
<section class="hero-section">
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="/template/img/mug1.jpg">
            <!-- <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 text-white">
                        <span>New Arrivals</span>
                        <h2>denim jackets</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                        <a href="#" class="site-btn sb-line">DISCOVER</a>
                        <a href="#" class="site-btn sb-white">ADD TO CART</a>
                    </div>
                </div> -->
            <!-- <div class="offer-card text-white">
                    <span>from</span>
                    <h2>$29</h2>
                    <p>SHOP NOW</p>
                </div> -->
            <!-- </div> -->
        </div>
        <div class="hs-item set-bg" data-setbg="/template/img/x-banner2.jpg">
            <!-- <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 text-white">
                        <span>New Arrivals</span>
                        <h2>denim jackets</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                        <a href="#" class="site-btn sb-line">DISCOVER</a>
                        <a href="#" class="site-btn sb-white">ADD TO CART</a>
                    </div>
                </div>
                <div class="offer-card text-white">
                    <span>from</span>
                    <h2>$29</h2>
                    <p>SHOP NOW</p>
                </div>
            </div> -->
        </div>
        <div class="hs-item set-bg" data-setbg="/template/img/stempel-flash1.jpg">
            <!-- <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 text-white">
                        <span>New Arrivals</span>
                        <h2>denim jackets</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                        <a href="#" class="site-btn sb-line">DISCOVER</a>
                        <a href="#" class="site-btn sb-white">ADD TO CART</a>
                    </div>
                </div>
                <div class="offer-card text-white">
                    <span>from</span>
                    <h2>$29</h2>
                    <p>SHOP NOW</p>
                </div>
            </div> -->
        </div>
    </div>
    <div class="container">
        <div class="slide-num-holder" id="snh-1"></div>
    </div>
</section>
<!-- Hero section end -->

<!-- Product filter section -->
<section class="product-filter-section">
    <div class="container">
        <ul class="product-filter-menu text-center mb-2">
            <div class="my-5">
                <h2>BROWSE PRODUCTS</h2>
            </div>
            <li><a href="/pages/">All</a></li>
            <?php foreach ($kategori as $p) : ?>
                <li><a href="/pages/index/<?= $p['id_kategori']; ?>"><?= $p['kategori']; ?></a></li>
            <?php endforeach; ?>
        </ul>
        <div class="row">
            <?php $i = 1; ?>
            <?php if ($produk == null) {
                echo "Produk Belum Tersedia";
            } ?>
            <?php foreach ($produk as $p) : ?>
                <div class="col-lg-3 col-sm-6 mb-3">
                    <div class="product-item">
                        <a href="/pages/produk/<?= $p['id_produk']; ?>" class="link">
                        <div class="">
                            <img src="/gambar/<?= $p['gambar']; ?>" alt="" class="gambar">
                        </div>
                        <div class="pi-text text-center">
                            <p><?= $p['nama_produk']; ?></p>
                            <p>Rp. <?= $p['harga']; ?></p>
                        </div>
                    </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- <div class="text-center pt-1">
            <button class="site-btn sb-line sb-dark">LOAD MORE</button>
            
        </div> -->
</section>
<?= $this->endSection(); ?>