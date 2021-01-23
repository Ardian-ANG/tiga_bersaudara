<?= $this->extend('admin/index'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="my-3 ml-4">Form update Data template_produk</h2>

                    <form action="/index.php/template_produkController/saveUpdate" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group row">
                            <label for="produk_id" class="col-sm-2 ml-4 col-form-label">Produk</label>
                            <input type="hidden" name="id" value="<?= $template_produk["id"]; ?>">
                            <div class="col-sm-9">
                                <select class="custom-select <?= ($validation->hasError("produk_id")) ? "is-invalid" : ""; ?>" id="produk_id" name="produk_id" value="<?= old("produk_id"); ?>">
                                    <option value="<?= $produkByTemplate['id_produk']; ?>"><?= $produkByTemplate['nama_produk']; ?></option>
                                    <?php foreach ($produk as $p) { ?>
                                        <option value="<?= $p['id_produk']; ?>"><?= $p['nama_produk']; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError("produk_id"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img" class="col-sm-2 ml-4 col-form-label">img</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control <?= ($validation->hasError("img")) ? "is-invalid" : ""; ?>" id="img" name="img" autofocus value="<?= (old("img")) ? old("img") : $template_produk["img"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("img"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title_template" class="col-sm-2 ml-4 col-form-label">title_template</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError("title_template")) ? "is-invalid" : ""; ?>" id="title_template" name="title_template" autofocus value="<?= (old("title_template")) ? old("title_template") : $template_produk["title_template"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("title_template"); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary ml-4">update template_produk</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>