<?= $this->extend('admin/index'); ?>

<?= $this->Section('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h2 class="my-3 ml-4">Form Ubah Data Pesanan</h2>

            <form action="/pemesanan/update/<?= $pemesanan['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="id" class="col-sm-2 ml-4 col-form-label">Pemesanan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('id')) ? 'is-invalid' : ''; ?>" id="id" name="id" autofocus value="<?= (old('id')) ? old('id') : $pemesanan['id'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('id'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status_pemesanan" class="col-sm-2 ml-4 col-form-label">Status Pemesanan</label>
                    <div class="col-sm-9">
                        <!-- <input type="int" class="form-control <?= ($validation->hasError('status_pemesanan')) ? 'is-invalid' : ''; ?>" id="status_pemesanan" name="status_pemesanan" value="<?= (old('status_pemesanan')) ? old('status_pemesanan') : $pemesanan['status_pemesanan'] ?>"> -->
                        <select class="custom-select <?= ($validation->hasError('status_pemesanan')) ? 'is-invalid' : ''; ?>" id="status_pemesanan" name="status_pemesanan">
                            <option selected  value="<?= (old('status_pemesanan')) ? old('status_pemesanan') : $pemesanan['status_pemesanan'] ?>"> <?= $pemesanan['status_pemesanan'] ?></option>
                            <option value="Dalam Antrian">Dalam Antrian</option>
                            <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
                            <option value="Sudah Selesai">Sudah Selesai</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('status_pemesanan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status_pembayaran" class="col-sm-2 ml-4 col-form-label">Status Pembayaran</label>
                    <div class="col-sm-9">
                        <!-- <input type="text" class="form-control <?= ($validation->hasError('status_pembayaran')) ? 'is-invalid' : ''; ?>" id="status_pembayaran" name="status_pembayaran" value="<?= (old('status_pembayaran')) ? old('status_pembayaran') : $pemesanan['status_pembayaran'] ?>"> -->
                        <select class="custom-select <?= ($validation->hasError('status_pembayaran')) ? 'is-invalid' : ''; ?>" id="status_pembayaran" name="status_pembayaran">
                        <option selected  value="<?= (old('status_pembayaran')) ? old('status_pembayaran') : $pemesanan['status_pembayaran'] ?>"><?= $pemesanan['status_pembayaran'] ?></option>
                            <option value="Belum Dibayar">Belum Dibayar</option>
                            <option value="Sudah Dibayar">Sudah Dibayar</option>
                            </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('status_pembayaran'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary ml-4">Ubah Pemesanan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>