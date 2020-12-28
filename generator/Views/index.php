<?= $this->extend('template/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Variable</h2>
                    <a href="/VariableController/add" class="btn btn-success">Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    THEAD
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($Variable as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        TBODY
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