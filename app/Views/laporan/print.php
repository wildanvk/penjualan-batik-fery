<!DOCTYPE html>
<html>

<head>
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
            border-bottom: 2px solid #000;
        }

        .date-range {
            text-align: center;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            text-align: center;
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Toko Batik Fery</h1>
    </div>
    <div class="date-range">
        <h3>Laporan Penjualan</h3>
        <p>Periode: <?= isset($bulan) ? $bulan : 'Semua' ?></p>
    </div>
    <table>
        <thead class="">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">ID Transaksi</th>
                <th class="text-center">Nama Pelanggan</th>
                <th class="text-center">Alamat pengiriman</th>
                <th class="text-center">Total bayar</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($transaksi)) { ?>
                <tr>
                    <td class="text-center" colspan="5">Tidak ada data</td>
                </tr>
            <?php } else { ?>
                <?php foreach ($transaksi as $key => $row) : ?>
                    <tr>
                        <td class="text-center align-middle"><?= $key + 1 ?></td>
                        <td class="text-center align-middle"><?= $row['id_transaksi'] ?></td>
                        <td class="text-center align-middle"><?= $row['nama'] ?></td>
                        <td class="text-center align-middle"><?= $row['alamat'] ?></td>
                        <td class="text-center align-middle"><?= format_rupiah($row['total_bayar']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>