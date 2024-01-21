<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Transaksi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <h3 class="card-header text-bg-primary py-2">Detail Transaksi</h3>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table" id="">
                                        <form action="/admin/transaksi/update" method="post">
                                            <input type="hidden" name="id_transaksi"
                                                value="<?= $transaksi['id_transaksi'] ?>">
                                            <tbody>
                                                <tr>
                                                    <th>ID Transaksi</th>
                                                    <td>:</td>
                                                    <td>
                                                        <span class="badge badge-primary">
                                                            <?= $transaksi['id_transaksi'] ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Pelanggan</th>
                                                    <td>:</td>
                                                    <td><?= $transaksi['nama'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat pengiriman</th>
                                                    <td>:</td>
                                                    <td><?= $transaksi['alamat'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Bayar</th>
                                                    <td>:</td>
                                                    <td>
                                                        <span
                                                            class="badge badge-primary"><?= format_rupiah($transaksi['total_bayar']) ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Status</th>
                                                    <td class="align-middle">:</td>
                                                    <td class="align-middle">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-3">
                                                                <select class="form-select" name="status" id="status">
                                                                    <option value="Menunggu Konfirmasi"
                                                                        <?= $transaksi['status'] === 'Menunggu Konfirmasi' ? 'selected' : '' ?>>
                                                                        Menunggu Konfirmasi</option>
                                                                    <option value="Diproses"
                                                                        <?= $transaksi['status'] === 'Diproses' ? 'selected' : '' ?>>
                                                                        Diproses</option>
                                                                    <option value="Sedang dikirim"
                                                                        <?= $transaksi['status'] === 'Sedang dikirim' ? 'selected' : '' ?>>
                                                                        Sedang dikirim</option>
                                                                    <option value="Selesai"
                                                                        <?= $transaksi['status'] === 'Selesai' ? 'selected' : '' ?>>
                                                                        Selesai</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-lg-3">
                                                                <button class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </form>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/admin/transaksi" class="btn btn-outline-secondary">Back</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover" id="tabelData">
                                        <thead>
                                            <th>Gambar produk</th>
                                            <th>Nama produk</th>
                                            <th>Harga produk</th>
                                            <th>Jumlah</th>
                                            <th>Total harga</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($detailTransaksi as $key => $row) { ?>
                                            <tr>
                                                <td class="align-middle">
                                                    <img src="<?php echo base_url('uploads/' . $row['gambar_produk']) ?>"
                                                        width="100" height="100" alt="">
                                                </td>
                                                <td class="align-middle"><?= $row['nama_produk'] ?></td>
                                                <td class="align-middle"><?= $row['harga_produk'] ?></td>
                                                <td class="align-middle"><?= $row['jumlah'] ?></td>
                                                <td class="align-middle"><?= format_rupiah($row['total_harga']) ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php echo view('_partials/footer'); ?>