<?= $this->extend('layout/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">pengguna</h2>
                    <a href="/penggunaController/add" class="btn btn-success">Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-center">nama_lengkap</th>
                                    <th scope="col" class="text-center">email</th>
                                    <th scope="col" class="text-center">password</th>
                                    <th scope="col" class="text-center">no_hp</th>
                                    <th scope="col" class="text-center">no_wa</th>
                                    <th scope="col" class="text-center">tgl</th>
                                    <th scope="col" class="text-center">hak_akses</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pengguna as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td class="text-center"><?= $p["nama_lengkap"]; ?></td>
                                        <td class="text-center"><?= $p["email"]; ?></td>
                                        <td class="text-center"><?= $p["password"]; ?></td>
                                        <td class="text-center"><?= $p["no_hp"]; ?></td>
                                        <td class="text-center"><?= $p["no_wa"]; ?></td>
                                        <td class="text-center"><?= $p["tgl"]; ?></td>
                                        <td class="text-center"><?= $p["hak_akses"]; ?></td>

                                        <td class="text-center">
                                            <a href="/penggunaController/update/<?= $p["id_user"]; ?>" class="btn btn-warning">Edit</a>
                                            <a href="/penggunaController/detail/<?= $p["id_user"]; ?>" class="btn btn-success">Detail</a>
                                            <a href="/penggunaController/delete/<?= $p["id_user"]; ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>