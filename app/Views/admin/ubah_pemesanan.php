<?= $this->extend('admin/index'); ?>

<?= $this->Section('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h2 class="my-3 ml-4">Form Ubah Data Pesanan</h2>

            <form action="/pemesanan/update/ <?= $produk['id_produk']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="pemesanan" class="col-sm-2 ml-4 col-form-label">Pemesanan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('pemesanan')) ? 'is-invalid' : ''; ?>" id="pemesanan" name="pemesanan" autofocus value="<?= (old('pemesanan')) ? old('pemesanan') : $produk['pemesanan'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('pemesanan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pembayaran" class="col-sm-2 ml-4 col-form-label">Pembayaran</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="pembayaran" name="pembayaran" value="<?= (old('pembayaran')) ? old('pembayaran') : $produk['pembayaran'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status_pemesanan" class="col-sm-2 ml-4 col-form-label">Status Pemesanan</label>
                    <div class="col-sm-9">
                        <input type="int" class="form-control <?= ($validation->hasError('status_pemesanan')) ? 'is-invalid' : ''; ?>" id="status_pemesanan" name="status_pemesanan" value="<?= (old('status_pemesanan')) ? old('status_pemesanan') : $produk['status_pemesanan'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('status_pemesanan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status_pembayaran" class="col-sm-2 ml-4 col-form-label">Status Pembayaran</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('status_pembayaran')) ? 'is-invalid' : ''; ?>" id="status_pembayaran" name="status_pembayaran" value="<?= (old('status_pembayaran')) ? old('status_pembayaran') : $produk['status_pembayaran'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('status_pembayaran'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bukti_pembayaran" class="col-sm-2 ml-4 col-form-label">Bukti Pembayaran</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('bukti_pembayaran')) ? 'is-invalid' : ''; ?>" id="bukti_pembayaran" name="bukti_pembayaran" value="<?= (old('bukti_pembayaran')) ? old('bukti_pembayaran') : $produk['bukti_pembayaran'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('bukti_pembayaran'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl" class="col-sm-2 ml-4 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('tgl')) ? 'is-invalid' : ''; ?>" id="tgl" name="tgl" value="<?= (old('tgl')) ? old('tgl') : $produk['tgl'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl'); ?>
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