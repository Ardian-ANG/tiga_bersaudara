<?= $this->extend('admin/index'); ?>

<?= $this->Section('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h2 class="my-3 ml-4">Form Tambah Kategori</h2>

            <form action="/kategori/save" method="post">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="kategori" class="col-sm-2 ml-4 col-form-label">Nama Kategori</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" id="kategori" name="kategori" autofocus value="<?= old('kategori'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kategori'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary ml-4">Tambah Kategori</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>