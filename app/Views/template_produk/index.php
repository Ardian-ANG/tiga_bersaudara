<?= $this->extend('admin/index'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Pemplate Produk</h2>
                    <a href="/template_produkController/add" class="btn btn-success">Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-center">Produk</th>
                                    <th scope="col" class="text-center">images</th>
                                    <th scope="col" class="text-center">template</th>
                                    <th scope="col" class="text-center">Opsi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($template_produk as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td class="text-center"><?= $p["nama_produk"]; ?></td>
                                        <td class="text-center"><?= $p["img"]; ?></td>
                                        <td class="text-center"><?= $p["title_template"]; ?></td>

                                        <td class="text-center">
                                            <!-- <a href="/template_produkController/update/<?= $p["id"]; ?>" class="btn btn-warning">Edit</a>
                                            <a href="/template_produkController/detail/<?= $p["id"]; ?>" class="btn btn-success">Detail</a> -->
                                            <a href="/template_produkController/delete/<?= $p["id"]; ?>" class="btn btn-danger">Delete</a>
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