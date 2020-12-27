<?= $this->extend('layout/template'); ?>

<?= $this->Section('content'); ?>
<div class="page-top-info">
    <div class="container">
        <h4>Detail Pembayaran</h4>
        <div class="site-pagination">
            <a href="">Home</a> /
            <a href="">Shop</a>
        </div>
    </div>
</div>

<!-- Page info -->
<section class="product-section">
    <div class="container">
        <div class="row">

            <div class=" product-details">
                <h2 class="p-title">aaaaaaaaa</h2>
                <h3 class="p-price">bbbbbbbb</h3>

                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate sit impedit architecto, porro illum eius fugit modi ducimus necessitatibus incidunt a nemo eveniet possimus doloribus eos nisi ex nostrum earum.</p>
                <p></p>


                <form action="/pages/shopNow" method="post">
                    <input type="hidden" value="" name="id_produk">
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



<?= $this->endSection(); ?>