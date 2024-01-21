<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
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
                        <div class="card-header">
                            Daftar Transaksi
                        </div>
                        <div class="mx-4 mt-3">
                            <form action="/admin/laporan/cetak" method="post" target="_blank">
                                <label class="control-label mb-1">Pilih Bulan</label>
                                <div class="mb-3 row">
                                    <div class="col-md-3 col-12">
                                        <div>
                                            <select name="bulan" id="bulan" class="form-select">
                                                <option value="">-- Pilih Bulan --</option>
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="12">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <button type="submit" class="btn btn-primary me-1">
                                            <i class="fas fa-print"></i>
                                            Cetak Laporan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <?php
                            if (!empty(session()->getFlashdata('success'))) { ?>
                                <div class="alert alert-success">
                                    <?php echo session()->getFlashdata('success'); ?>
                                </div>
                            <?php } ?>

                            <?php if (!empty(session()->getFlashdata('info'))) { ?>
                                <div class="alert alert-info">
                                    <?php echo session()->getFlashdata('info'); ?>
                                </div>
                            <?php } ?>

                            <?php if (!empty(session()->getFlashdata('warning'))) { ?>
                                <div class="alert alert-warning">
                                    <?php echo session()->getFlashdata('warning'); ?>
                                </div>
                            <?php } ?>
                            <div class="">
                                <table class="table table-bordered table-hovered" id="tabelData">
                                    <thead>
                                        <tr>
                                            <th width="10px" class="text-center">No</th>
                                            <th class="text-center">ID Transaksi</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Alamat pengiriman</th>
                                            <th>Total Bayar</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($transaksi as $key => $row) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo $key + 1 ?></td>
                                                <td><?php echo $row['id_transaksi']; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['alamat']; ?></td>
                                                <td><?php echo format_rupiah($row['total_bayar']); ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['status'] == 'Menunggu Konfirmasi') { ?>
                                                        <span class="badge text-bg-warning m-0"><?= $row['status'] ?></span>
                                                    <?php } elseif ($row['status'] == 'Diproses') { ?>
                                                        <span class="badge text-bg-warning m-0"><?= $row['status'] ?></span>
                                                    <?php } elseif ($row['status'] == 'Sedang Dikirim') { ?>
                                                        <span class="badge text-bg-spanrimary m-0"><?= $row['status'] ?></span>
                                                    <?php } else { ?>
                                                        <span class="badge text-bg-success m-0"><?= $row['status'] ?></span>
                                                    <?php } ?>
                                                </td>
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

<?php echo view('_partials/footer'); ?>