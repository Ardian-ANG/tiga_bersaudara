<?= $this->extend('layout/template'); ?>


<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Keranjang</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col" class="text-center">Pemesanan</th>
                                    <th scope="col" class="text-center">Desail</th>
                                    <th scope="col" class="text-center">Deskripsi</th>
                                    <th scope="col" class="text-center">Pembayaran</th>
                                    <th scope="col" class="text-center">Status Pemesanan</th>
                                    <th scope="col" class="text-center">Status Pembayaran</th>
                                    <th scope="col" class="text-center">Bukti Pembayaran</th>
                                    <th scope="col" class="text-center">Tanggal</th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pemesanan as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $p['nama_produk']; ?></td>
                                        <td><?= $p['desain']; ?></td>
                                        <td><?= $p['ket_pemesanan']; ?></td>
                                        <td><?= $p['pembayaran']; ?></td>
                                        <td><?= $p['status_pemesanan']; ?></td>
                                        <td><?= $p['status_pembayaran']; ?></td>
                                        <td><?= $p['bukti_pembayaran']; ?></td>
                                        <td><?= $p['tgl']; ?></td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection(); ?>