<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php $errors = session()->getFlashdata('errors');
                    if (!empty($errors)) { ?>
                    <div class="alert alert-danger" role="alert">
                        Whoops! Ada kesalahan saat input data, yaitu:
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                            <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <?php } ?>
                    <?php echo form_open_multipart('produk/store') ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="gambar">Gambar</label>
                                        <img src="<?= base_url('uploads/') ?>placeholder.png" width="475px" alt=""
                                            id="gambar_preview">
                                        <label for="gambar_produk">Ganti gambar</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="gambar_produk"
                                                id="gambar_produk" onchange="previewFoto()">
                                            <label class="custom-file-label" for="gambar_produk">Pilih gambar</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="id_kategori">Kategori</label>
                                        <select name="id_kategori" id="id_kategori" class="form-control">
                                            <?php foreach ($kategori as $key => $data) { ?>
                                            <option value="<?= $key ?>">
                                                <?= $data ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_produk">Nama produk</label>
                                        <input type="text" class="form-control" name="nama_produk" id="nama_produk"
                                            placeholder="Nama produk" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_produk">Harga</label>
                                        <input type="number" class="form-control" name="harga_produk" id="harga_produk"
                                            placeholder="Harga produk" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="" selected>Pilih Status</option>
                                            <option value="Active">
                                                Active
                                            </option>
                                            <option value="Inctive">
                                                Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30"
                                            rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('produk') ?>" class="btn btn-outline-info">Back</a>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </div>
                    </div>
                    <?php form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('_partials/footer'); ?>