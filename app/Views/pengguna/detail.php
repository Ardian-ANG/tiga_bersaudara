<?= $this->extend('template/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h2>Detail pengguna</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>id_user":</b><?= $pengguna["id_user"];?></li>
<li class="list-group-item"><b>nama_lengkap":</b><?= $pengguna["nama_lengkap"];?></li>
<li class="list-group-item"><b>email":</b><?= $pengguna["email"];?></li>
<li class="list-group-item"><b>password":</b><?= $pengguna["password"];?></li>
<li class="list-group-item"><b>no_hp":</b><?= $pengguna["no_hp"];?></li>
<li class="list-group-item"><b>no_wa":</b><?= $pengguna["no_wa"];?></li>
<li class="list-group-item"><b>tgl":</b><?= $pengguna["tgl"];?></li>
<li class="list-group-item"><b>hak_akses":</b><?= $pengguna["hak_akses"];?></li>

                </ul>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>