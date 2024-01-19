    <?= $this->extend('_partials/user/template') ?>
    <?= $this->section('content') ?>
    <!-- Header-->
    <header class="bg-primary py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Toko Batik</h1>
                <p class="lead fw-normal text-white mb-0">Toko Batik yang menyediakan produk yang berkualitas dan
                    terjamin di Kota Pekalongan.</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <?php if ($produk) { ?>
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-3 justify-content-center">
                <?php foreach ($produk as $key => $row) : ?>
                <div class="col mb-5">
                    <div class="card p-2 h-100">
                        <!-- Product image-->
                        <a href="/shop/detail/<?= $row['id_produk'] ?>">
                            <img class="card-img-top" src="<?= base_url('uploads/') . $row['gambar_produk'] ?>"
                                alt="<?= $row['nama_produk'] ?>" />
                        </a>
                        <!-- Product details-->
                        <div class="card-body p-4 text-center">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?= $row['nama_produk'] ?></h5>
                                <!-- Product price-->
                                <?= format_rupiah($row['harga_produk']) ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn btn-primary mt-auto"
                                    href="/shop/tambah_keranjang/<?= $row['id_produk'] ?>">
                                    <i class="bi bi-cart"></i>
                                    <span class="d-none d-lg-inline">Tambah ke keranjang</span></a>
                                <a class="btn btn-outline-success mt-auto"
                                    href="/shop/detail/<?= $row['id_produk'] ?>">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php } else { ?>
            <div class="col mb-5 text-center">
                <h2>Tidak ada produk yang tersedia</h2>
            </div>
            <?php } ?>
        </div>
    </section>
    <?= $this->endSection() ?>