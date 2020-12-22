<?= $this->extend('admin/index'); ?>


<?= $this->Section('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Produk-Produk</h2>
                <a href="/produk/create"><button class="btn btn-primary mb-3">Tambah Data Produk</button> </a>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="text-center">Gambar</th>
                                <th scope="col" class="text-center">Nama</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($produk as $p) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><img src="/gambar/<?= $p['gambar']; ?>" alt="" class="gambar"></td>
                                    <td class="text-center"><?= $p['nama_produk']; ?></td>
                                    <td class="text-center">
                                        <a href="/produk/edit/<?= $p['id_produk']; ?>" class="btn btn-warning">Edit</a>


                                        <a href="/produk/detail<?= $p['id_produk']; ?>" class="btn btn-success">Detail</a>


                                        <form action="/produk/<?= $p['id_produk']; ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete</button>
                                        </form>
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