<?= $this->extend('admin/index'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="my-3 ml-4">Form Tambah Data template_produk</h2>

                    <form action="/index.php/template_produkController/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="form-group row">
                            <label for="id_produk" class="col-sm-2 ml-4 col-form-label">Produk</label>
                            <div class="col-sm-9">
                                <select class="custom-select <?= ($validation->hasError("id_produk")) ? "is-invalid" : ""; ?>" id="id_produk" name="id_produk" value="<?= old("id_produk"); ?>">
                                    <option value="">Pilih</option>
                                    <?php foreach ($produk as $p) { ?>
                                        <option value="<?= $p['id_produk']; ?>"><?= $p['nama_produk']; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError("id_produk"); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="img" class="col-sm-2 ml-4 col-form-label">img</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control <?= ($validation->hasError("img")) ? "is-invalid" : ""; ?>" id="img" name="img" value="<?= old("img"); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("img"); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title_template" class="col-sm-2 ml-4 col-form-label">title_template</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError("title_template")) ? "is-invalid" : ""; ?>" id="title_template" name="title_template" value="<?= old("title_template"); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("title_template"); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary ml-4">Tambah template_produk</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>