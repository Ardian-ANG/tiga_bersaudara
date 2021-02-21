<?= $this->extend('admin/index'); ?>


<?= $this->Section('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Pemesanan</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col" class="text-center">Pemesanan</th>
                                <th scope="col" class="text-center">Desain</th>
                                <th scope="col" class="text-center">Deskripsi</th>
                                <th scope="col" class="text-center">Biaya Tambahan</th>
                                <th scope="col" class="text-center">Pembayaran</th>
                                <th scope="col" class="text-center">Status Pemesanan</th>
                                <th scope="col" class="text-center">Status Pembayaran</th>
                                <th scope="col" class="text-center">Bukti Pembayaran</th>
                                <th scope="col" class="text-center">Tanggal</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pemesanan as $p) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $p['nama_lengkap'] . '(' . $p['id'] . ') / ' . $p['nama_produk']; ?></td>
                                    <td><?= $p['desain']; ?></td>
                                    <td><?= $p['ket_pemesanan']; ?></td>
                                    <td><?= $p['biaya_tambahan']; ?></td>
                                    <td><?= $p['pembayaran']; ?></td>
                                    <td><?= $p['status_pemesanan']; ?></td>
                                    <td><?= $p['status_pembayaran']; ?></td>
                                    <td><?= $p['bukti_pembayaran']; ?></td>
                                    <td><?= $p['tgl']; ?></td>
                                    <td class="text-center">
                                        <a href="/pemesanan/edit/<?= $p['id'] ?>" class="btn btn-sm mb-1 mr-1 btn-warning">Update</a>
                                        <a href="/pemesanan/delete/<?= $p['id'] ?>" onclick="return confirm('apakah anda yakin?')" class="btn btn-sm mb-1 mr-1 btn-danger">delete</a>
                                        <!-- <form action="" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')">Delete</button>
                                        </form> -->
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