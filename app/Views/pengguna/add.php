<?= $this->extend('template/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="my-3 ml-4">Form Tambah Data pengguna</h2>

                    <form action="/index.php/penggunaController/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        
                <div class="form-group row">
                    <label for="nama_lengkap" class="col-sm-2 ml-4 col-form-label">nama_lengkap</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError("nama_lengkap")) ? "is-invalid" : ""; ?>" id="nama_lengkap" name="nama_lengkap" value="<?= old("nama_lengkap"); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError("nama_lengkap"); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 ml-4 col-form-label">email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError("email")) ? "is-invalid" : ""; ?>" id="email" name="email" value="<?= old("email"); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError("email"); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-sm-2 ml-4 col-form-label">password</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError("password")) ? "is-invalid" : ""; ?>" id="password" name="password" value="<?= old("password"); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError("password"); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="no_hp" class="col-sm-2 ml-4 col-form-label">no_hp</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError("no_hp")) ? "is-invalid" : ""; ?>" id="no_hp" name="no_hp" value="<?= old("no_hp"); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError("no_hp"); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="no_wa" class="col-sm-2 ml-4 col-form-label">no_wa</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError("no_wa")) ? "is-invalid" : ""; ?>" id="no_wa" name="no_wa" value="<?= old("no_wa"); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError("no_wa"); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tgl" class="col-sm-2 ml-4 col-form-label">tgl</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError("tgl")) ? "is-invalid" : ""; ?>" id="tgl" name="tgl" value="<?= old("tgl"); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError("tgl"); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="hak_akses" class="col-sm-2 ml-4 col-form-label">hak_akses</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError("hak_akses")) ? "is-invalid" : ""; ?>" id="hak_akses" name="hak_akses" value="<?= old("hak_akses"); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError("hak_akses"); ?>
                        </div>
                    </div>
                </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary ml-4">Tambah pengguna</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>