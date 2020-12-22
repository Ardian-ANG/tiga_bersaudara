<?= $this->extend('admin/index'); ?>

<?= $this->Section('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h2 class="my-3 ml-4">Form Ubah Data Produk</h2>

            <form action="/produk/update/<?= $produk['id_produk']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="gambarLama" value="<?= $produk['gambar']; ?>">
                <div class="form-group row">
                    <label for="nama_produk" class="col-sm-2 ml-4 col-form-label">Nama Produk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_produk')) ? 'is-invalid' : ''; ?>" id="nama_produk" name="nama_produk" autofocus value="<?= (old('nama_produk')) ? old('nama_produk') : $produk['nama_produk'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_produk'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_kategori" class="col-sm-2 ml-4 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                        <select class="custom-select <?= ($validation->hasError('id_kategori')) ? 'is-invalid' : ''; ?>" name="id_kategori" id="id_kategori">
                            <option value="<?= (old('id_kategori')) ? old('id_kategori') : $produk['id_kategori'] ?>">Pilih Kategori</option>
                            <?php foreach ($kategori as $p) : ?>
                                <option value="<?= $p['id_kategori']; ?>"><?= $p['kategori']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_kategori'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gambar" class="col-sm-2 ml-4 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/gambar/<?= $produk['gambar']; ?>" class=" col-sm-12 img-thumnail img-preview">
                    </div>
                    <div class="col-sm-7">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('gambar'); ?>
                            </div>
                            <label class="custom-file-label" for="gambar"><?= $produk['gambar']; ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-sm-2 ml-4 col-form-label">Harga</label>
                    <div class="col-sm-9">
                        <input type="int" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= (old('harga')) ? old('harga') : $produk['harga'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('harga'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keterangan" class="col-sm-2 ml-4 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" value="<?= (old('keterangan')) ? old('keterangan') : $produk['keterangan'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('keterangan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="estimasi_waktu" class="col-sm-2 ml-4 col-form-label">Estimasi Waktu</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('estimasi_waktu')) ? 'is-invalid' : ''; ?>" id="estimasi_waktu" name="estimasi_waktu" value="<?= (old('estimasi_waktu')) ? old('estimasi_waktu') : $produk['estimasi_waktu'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('estimasi_waktu'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary ml-4">Ubah Produk</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>