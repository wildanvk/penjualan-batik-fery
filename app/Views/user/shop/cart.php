    <?= $this->extend('_partials/user/template') ?>
    <?= $this->section('content') ?>
    <!-- Header-->
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-3">
            <div class="row my-3 px-1">
                <h2>Keranjang Anda</h2>
                <p>Berikut adalah isi dari keranjang Anda.</p>
            </div>
            <div class="row g-4 ">
                <div class="col-lg-8">
                    <div class="shadow rounded-2 table-responsive">
                        <table class="table table-borderless table-striped table-hover">
                            <thead class="table-dark align-middle">
                                <tr>
                                    <th>No.</th>
                                    <th></th>
                                    <th colspan="2">Nama Produk</th>
                                    <th>Harga Produk</th>
                                    <th colspan="2" class="text-center">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <?php if (empty($listKeranjang)) { ?>
                                    <tr>
                                        <td colspan="7" class="text-center py-3">
                                            <h5>Keranjang Anda Kosong</h5>
                                        </td>
                                    </tr>
                                <?php } else { ?>
                                    <?php foreach ($listKeranjang as $keys => $rows) : ?>
                                        <tr>
                                            <td class="text-center"><?= $keys + 1 ?></td>
                                            <td>
                                                <img class="rounded-2" width="100px" src="<?= base_url('uploads/') . $rows['gambar_produk'] ?>" alt="">
                                            </td>
                                            <td><?= $rows['nama_produk'] ?></td>
                                            <td></td>
                                            <td><?= format_rupiah($rows['harga_produk']) ?></td>
                                            <form action="/shop/update_keranjang" method="post">
                                                <td>
                                                    <input type="hidden" name="id_cart" value="<?= $rows['id_cart'] ?>">
                                                    <div class="input-group justify-content-center">
                                                        <button class="btn btn-outline-secondary tombolKurang" type="button" data-id="<?= $rows['id_cart'] ?>">
                                                            -
                                                        </button>
                                                        <input class="form-control text-center" id="jumlah-produk-<?= $rows['id_cart'] ?>" type="num" value="<?= $rows['jumlah'] ?>" style="max-width: 3rem" name="jumlah" />
                                                        <button class="btn btn-outline-secondary tombolTambah" type="button" data-id="<?= $rows['id_cart'] ?>">
                                                            +
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <a href="/shop/hapus_keranjang/<?= $rows['id_cart'] ?>" class="btn btn-danger">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </a>
                                                </td>
                                            </form>
                                        </tr>
                                    <?php endforeach ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow">
                        <div class="card-header text-bg-dark">
                            <h5 class="m-0">Detail</h5>
                        </div>

                        <div class="card-body">
                            <?php foreach ($listKeranjang as $keys => $rows) { ?>
                                <div class="row px-4">
                                    <div class="col-6 my-2">
                                        <p class="my-1"><?= $rows['nama_produk'] ?></p>
                                        <p class="my-1"><?= $rows['jumlah'] ?> x <?= format_rupiah($rows['harga_produk']) ?>
                                        </p>
                                    </div>
                                    <div class="col-6 d-flex align-items-center justify-content-end">
                                        <p class="my-1"><?= format_rupiah($rows['total']) ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="row px-4 my-2">
                                <div class="col-6 col-lg-5">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-6 col-lg-7 d-flex align-items-center justify-content-end">
                                    <h5><?= format_rupiah($grandTotal) ?></h5>
                                </div>
                            </div>
                            <div class="d-grid py-2">
                                <?php if (empty($listKeranjang)) { ?>
                                    <button type="button" class="btn btn-secondary" disabled>Checkout</button>
                                <?php } else { ?>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkoutModal">
                                        Checkout
                                    </button>
                                <?php } ?>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModal" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <form action="/shop/checkout" method="post">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="checkoutModal">Checkout Keranjang</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xl-6 col-12">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Produk</th>
                                                                    <th class="text-end">Harga</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="align-middle">
                                                                <?php foreach ($listKeranjang as $keys => $rows) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <p class="my-1"><?= $rows['nama_produk'] ?></p>
                                                                            <p class="my-1"><?= $rows['jumlah'] ?> x
                                                                                <?= format_rupiah($rows['harga_produk']) ?>
                                                                            </p>
                                                                        </td>
                                                                        <td class="text-end">
                                                                            <?= format_rupiah($rows['total']) ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                        </table>
                                                        <div class="row px-1 my-2">
                                                            <div class="col-6 col-lg-5">
                                                                <h4>Total</h4>
                                                            </div>
                                                            <div class="col-6 col-lg-7 d-flex align-items-center justify-content-end">
                                                                <h5><?= format_rupiah($grandTotal) ?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-12">
                                                        <div class="mb-3">
                                                            <label for="nama" class="form-label">Nama</label>
                                                            <input type="text" class="form-control" id="nama" placeholder="Masukkan nama Anda" value="<?= $user['nama'] ?>" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda" value="<?= $user['email'] ?>" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="telepon" class="form-label">No. Hp</label>
                                                            <input type="text" class="form-control" id="telepon" placeholder="Masukkan nomor HP Anda" value="<?= $user['telepon'] ?>" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="telepon" class="form-label">Alamat
                                                                pengiriman</label>
                                                            <textarea class="form-control" placeholder="Masukkan Alamat tujuan" name="alamat" id="alamat" cols="30" rows="5"></textarea>
                                                        </div>

                                                        <div class="text-center">
                                                            <p class="fst-italic">Pembayaran dilakukan ketika pesanan
                                                                sudah
                                                                sampai
                                                                di
                                                                lokasi Anda</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Checkout sekarang</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?= $this->section('javascript') ?>
    <script>
        $(document).ready(function() {

            $('.tombolTambah').click(function() {
                var id = $(this).data('id');
                var jumlah = parseInt($('#jumlah-produk-' + id).val());
                $('#jumlah-produk-' + id).val(jumlah + 1);
            });

            $('.tombolKurang').click(function() {
                var id = $(this).data('id');
                var jumlah = parseInt($('#jumlah-produk-' + id).val());
                if (jumlah > 1) {
                    $('#jumlah-produk-' + id).val(jumlah - 1);
                }
            });
        });

        <?php if (session()->getFlashdata('gagal')) { ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '<?= session()->getFlashdata('gagal') ?>',
                showConfirmButton: true,
                timer: 3000
            })
        <?php  } ?>

        <?php if (session()->getFlashdata('checkout')) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Checkout berhasil',
                text: '<?= session()->getFlashdata('checkout') ?>',
                showConfirmButton: true,
                timer: 3000
            })
        <?php  } ?>
    </script>
    <?= $this->endSection() ?>
    <?= $this->endSection() ?>