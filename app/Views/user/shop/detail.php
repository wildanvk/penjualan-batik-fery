    <?= $this->extend('_partials/user/template') ?>
    <?= $this->section('content') ?>
    <!-- Header-->
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <img class="card-img-top mb-5 mb-md-0 rounded-2" src="<?= base_url('uploads/') . $produk['gambar_produk'] ?>" alt="Gambar produk" />
                </div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder"><?= $produk['nama_produk'] ?></h1>
                    <div class="fs-5 mb-5">
                        <span><?= format_rupiah($produk['harga_produk']) ?> / pcs</span>
                    </div>
                    <p class="lead"><?= $produk['deskripsi'] ?></p>
                    <form action="/shop/tambah_keranjang/<?= $produk['id_produk'] ?>" method="get">
                        <div class="d-flex">
                            <button class="btn btn-outline-secondary" id="tombolKurang" type="button">
                                -
                            </button>
                            <input class="form-control text-center mx-2" id="jumlah" type="num" value="1" style="max-width: 3rem" name="jumlah" />
                            <button class="btn btn-outline-secondary" id="tombolTambah" type="button">
                                +
                            </button>
                            <button class="btn btn-outline-primary ms-3" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                    </form>
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