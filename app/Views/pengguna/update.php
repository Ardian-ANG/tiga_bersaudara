<?= $this->extend('template/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="my-3 ml-4">Form update Data pengguna</h2>

                    <form action="/index.php/penggunaController/saveUpdate" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_user" value="<?= $pengguna["id_user"]; ?>">
                        <div class="form-group row">
                            <label for="nama_lengkap" class="col-sm-2 ml-4 col-form-label">nama_lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError("nama_lengkap")) ? "is-invalid" : ""; ?>" id="nama_lengkap" name="nama_lengkap" autofocus value="<?= (old("nama_lengkap")) ? old("nama_lengkap") : $pengguna["nama_lengkap"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("nama_lengkap"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 ml-4 col-form-label">email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError("email")) ? "is-invalid" : ""; ?>" id="email" name="email" autofocus value="<?= (old("email")) ? old("email") : $pengguna["email"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("email"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 ml-4 col-form-label">password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError("password")) ? "is-invalid" : ""; ?>" id="password" name="password" autofocus value="<?= (old("password")) ? old("password") : $pengguna["password"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("password"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-2 ml-4 col-form-label">no_hp</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError("no_hp")) ? "is-invalid" : ""; ?>" id="no_hp" name="no_hp" autofocus value="<?= (old("no_hp")) ? old("no_hp") : $pengguna["no_hp"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("no_hp"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_wa" class="col-sm-2 ml-4 col-form-label">no_wa</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError("no_wa")) ? "is-invalid" : ""; ?>" id="no_wa" name="no_wa" autofocus value="<?= (old("no_wa")) ? old("no_wa") : $pengguna["no_wa"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("no_wa"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl" class="col-sm-2 ml-4 col-form-label">tgl</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError("tgl")) ? "is-invalid" : ""; ?>" id="tgl" name="tgl" autofocus value="<?= (old("tgl")) ? old("tgl") : $pengguna["tgl"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("tgl"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hak_akses" class="col-sm-2 ml-4 col-form-label">hak_akses</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError("hak_akses")) ? "is-invalid" : ""; ?>" id="hak_akses" name="hak_akses" autofocus value="<?= (old("hak_akses")) ? old("hak_akses") : $pengguna["hak_akses"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("hak_akses"); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary ml-4">update pengguna</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>