    <?= $this->extend('_partials/user/template') ?>
    <?= $this->section('content') ?>
    <!-- Header-->
    <!-- Section-->
    <section class="py-5 flex-grow-1">
        <div class="container px-4 px-lg-5 my-5 d-flex justify-content-center">
            <div class="card col-lg-5">
                <h5 class="card-header text-bg-primary">Riwayat Transaksi</h5>
                <div class="card-body">
                    <?php if ($transaksi == null) { ?>
                        <div class="row g-0 py-3">
                            <div class="card-body">
                                <h4 class="card-title text-center">Tidak ada riwayat transaksi</h4>
                            </div>
                        </div>
                    <?php } else { ?>
                        <?php foreach ($transaksi as $key => $row) : ?>
                            <div class="row g-0 py-3">
                                <div class="col-12">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center gap-2 my-2">
                                            <h4 class="card-title m-0"><?= $row['id_transaksi'] ?></h4>
                                            <?php if ($row['status'] == 'Menunggu Konfirmasi') { ?>
                                                <p class="badge text-bg-warning m-0"><?= $row['status'] ?></p>
                                            <?php } elseif ($row['status'] == 'Diproses') { ?>
                                                <p class="badge text-bg-warning m-0"><?= $row['status'] ?></p>
                                            <?php } elseif ($row['status'] == 'Sedang Dikirim') { ?>
                                                <p class="badge text-bg-primary m-0"><?= $row['status'] ?></p>
                                            <?php } else { ?>
                                                <p class="badge text-bg-success m-0"><?= $row['status'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <p class="card-text">Diajukan
                                            pada <?= $row['created_at'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <?= $this->section('javascript') ?>
    <script>
        $(document).ready(function() {

            $('#tombolTambah').click(function() {
                var jumlah = parseInt($('#jumlah').val());
                $('#jumlah').val(jumlah + 1);
            });

            $('#tombolKurang').click(function() {
                var jumlah = parseInt($('#jumlah').val());
                if (jumlah > 1) {
                    $('#jumlah').val(jumlah - 1);
                }
            });
        });
    </script>
    <?= $this->endSection() ?>
    <?= $this->endSection() ?>