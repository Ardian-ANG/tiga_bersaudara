<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Codeigniter 4 PDF Example - positronx.io</title>
    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            margin-left: auto;
            margin-right: auto
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <div class="table-responsive">

        <h2 align=center>Laporan Penjualan Produk</h2>

        <table>
            <thead>
                <tr>
                    <th width="30px">No</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Nama Produk</th>
                    <th>Debet</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($produk as $p) : ?>
                    <tr>
                        <td align=center scope="row"><?= $i++; ?></td>
                        <td align=center><?= $p['tgl']; ?></td>
                        <td align=center><?= $p['nama_lengkap']; ?></td>
                        <td align=center><?= $p['nama_produk']; ?></td>
                        <td align=center><?php $explode = explode(" ", $p['ket_pemesanan']); ?>Rp. <?= $explode[3]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>