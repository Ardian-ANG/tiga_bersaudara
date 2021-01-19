<!-- menu -->
<ul class="main-menu">
    <li><a href="/">Home</a></li>
    <li><a href="#">Display</a>
        <ul class="sub-menu">
            <li><a href="/pages/produk/89">Spanduk</a></li>
        </ul>
    </li>
    <li><a href="#">Kebutuhan Promosi</a>
        <ul class="sub-menu">
        <li><a href="/pages/produk/96">Kartu Nama</a></li>
        </ul>
    </li>
    <li><a href="#">Suvenir</a>
        <ul class="sub-menu">
            <li><a href="/pages/produk/95">Mug</a></li>
        </ul>
    </li>
    <li><a href="#">Textile</a>
        <ul class="sub-menu">
        <li><a href="/pages/produk/90">Baju</a></li>
        </ul>
    </li>
    <?php if ($session == 'admin') : ?>

        <li><a href="#">Pages</a>
            <ul class="sub-menu">
                <li><a href="/pages/produk">Keterangan Produk</a></li>
                <li><a href="/pages/kategori">Kategori Produk</a></li>
                <li><a href="/pages/keranjang">Keranjang</a></li>
                <li><a href="/pages/checkout">Checkout</a></li>
                <li><a href="/pages/kontak">Kontak Kami</a></li>
                <li><a href="/pages/detail_pembayaran">detail pembayaran</a></li>
            </ul>
        </li>
        <li><a href="/admin">Admin</a></li>
    <?php endif; ?>
    <?php if ($session == 'user') : ?>
        <li><a href="/pages/logout">Logout</a></li>
    <?php endif; ?>

</ul>
</div>
</nav>
</header>
<!-- Header section end -->