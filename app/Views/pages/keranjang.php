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
                                    <th scope="col" class="text-center">Desain</th>
                                    <th scope="col" class="text-center">Deskripsi</th>
                                    <th scope="col" class="text-center">Biaya Tambahan</th>
                                    <th scope="col" class="text-center">Pembayaran</th>
                                    <th scope="col" class="text-center">Status Pemesanan</th>
                                    <th scope="col" class="text-center">Status Pembayaran</th>
                                    <th scope="col" class="text-center">Bukti Pembayaran</th>
                                    <th scope="col" class="text-center">Tanggal</th>
                                    <th scope="col" class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pemesanan as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $p['nama_produk']; ?></td>
                                        <?php if ($p['desain'] != '') { ?>
                                            <td><a href="/custom_desain/<?= $p['desain']; ?>"><img src="/custom_desain/<?= $p['desain']; ?>" alt="<?= $p['desain']; ?>" width="500" height="auto"></a></td>
                                        <?php } else { ?>
                                            <td></td>
                                        <?php } ?>
                                        <td><?= $p['ket_pemesanan']; ?></td>
                                        <td><?= $p['biaya_tambahan']; ?></td>
                                        <td><?= $p['pembayaran']; ?></td>
                                        <td><?= $p['status_pemesanan']; ?></td>
                                        <td><?= $p['status_pembayaran']; ?></td>
                                        <?php if ($p['bukti_pembayaran'] != '') { ?>
                                            <td><a href="/pembayaran/<?= $p['bukti_pembayaran']; ?>"><img src="/pembayaran/<?= $p['bukti_pembayaran']; ?>" alt="<?= $p['bukti_pembayaran']; ?>" width="500" height="auto"></a></td>
                                        <?php } else { ?>
                                            <td></td>
                                        <?php } ?>
                                        <td><?= $p['tgl']; ?></td>
                                        <td>
                                            <a href="/pages/detail_pembayaran/<?= $p['id'] ?>">
                                                <button class="btn btn-primary mb-1 mr-1">Upload Bukti</button>
                                            </a>
                                            <a href="/pages/delete_pemesanan/<?= $p['id'] ?>" onclick="return confirm('apakah anda yakin?')">
                                                <button class="btn btn-danger">Delete</button>
                                            </a>
                                    </tr>
                                <?php endforeach; ?>

                                <tr>
                                    <td colspan="8" class="text-center">
                                        <p>Total Pembayaran dari <?= $i - 1; ?> produk</p>
                                    </td>
                                    <td colspan="1">
                                        <?php $total = 0;
                                        foreach ($pemesanan as $p) : ?>
                                            <?php $explode = explode(" ", $p['ket_pemesanan']); ?>
                                            <?php $total += $explode[3] + $p['biaya_tambahan']; ?>
                                        <?php endforeach; ?>
                                        <?= "RP. " . $total;; ?>
                                    </td>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td colspan="11"></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection(); ?>