<?= $this->extend('admin/index'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h2>Detail template_produk</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>id":</b><?= $template_produk["id"];?></li>
<li class="list-group-item"><b>id_produk":</b><?= $template_produk["id_produk"];?></li>
<li class="list-group-item"><b>img":</b><?= $template_produk["img"];?></li>
<li class="list-group-item"><b>title_template":</b><?= $template_produk["title_template"];?></li>

                </ul>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>