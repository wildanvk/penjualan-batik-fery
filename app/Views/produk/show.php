<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Produk</li>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="<?= base_url('uploads/' . $produk['gambar_produk']) ?>" alt="" class=""
                                        width="500">
                                </div>
                                <div class="col-md-8">
                                    <dl class="dl-horizontal">
                                        <dt>Kategori produk</dt>
                                        <dd><?= $produk['nama_kategori'] ?></dd>
                                        <dt>Nama produk</dt>
                                        <dd><?= $produk['nama_produk'] ?></dd>
                                        <dt>Harga produk</dt>
                                        <dd><?= format_rupiah($produk['harga_produk'])  ?></dd>
                                        <dt>Status produk</dt>
                                        <dd><?= $produk['status'] ?></dd>
                                        <dt>Deskripsi produk</dt>
                                        <dd><?= $produk['deskripsi'] ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/admin/produk" class="btn btn-outline-info">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo view('_partials/footer'); ?>