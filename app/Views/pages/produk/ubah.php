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
    <div class="col-md-12">
        <div class="card">
            <h2 class="my-3 ml-4">Data Ukuran</h2>

            <form action="/ukuranController/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="produk_id" value="<?= $produk['id_produk']; ?>">

                <div class="form-group row">
                    <label for="ukuran" class="col-sm-2 ml-4 col-form-label">ukuran</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError("ukuran")) ? "is-invalid" : ""; ?>" id="ukuran" name="ukuran" value="<?= old("ukuran"); ?>">
                        <small class="text-warning">Format: 100cm x 100cm</small>
                        <div class="invalid-feedback">
                            <?= $validation->getError("ukuran"); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="harga" class="col-sm-2 ml-4 col-form-label">harga</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError("harga_ukuran")) ? "is-invalid" : ""; ?>" id="harga_ukuran" name="harga_ukuran" value="<?= old("harga_ukuran"); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError("harga_ukuran"); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary ml-4">Tambah ukuran</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="text-center">ukuran</th>
                            <th scope="col" class="text-center">harga</th>
                            <th scope="col" class="text-center">Opsi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($ukuran as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td class="text-center"><?= $p["ukuran"]; ?></td>
                                <td class="text-center"><?= $p["harga"]; ?></td>

                                <td class="text-center">
                                    <a href="/ukuranController/delete/<?= $p["id"]; ?>/<?= $produk['id_produk']; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <h2 class="my-3 ml-4">Template Produk</h2>
            <div class="row">
                <div class="col-lg-12">

                    <form action="/template_produkController/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">

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
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-center">images</th>
                                    <th scope="col" class="text-center">template</th>
                                    <th scope="col" class="text-center">Opsi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($template_produk as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td class="text-center"><a href="/template_produk/<?= $p["img"]; ?>">
                                                <img width="100px" src="/template_produk/<?= $p["img"]; ?>" alt="">
                                            </a></td>
                                        <td class="text-center"><?= $p["title_template"]; ?></td>

                                        <td class="text-center">
                                            <a href="/template_produkController/delete/<?= $p["id"]; ?>/<?= $produk['id_produk']; ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?= $this->endSection(); ?>