<?php

use function PHPSTORM_META\type;

echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $inputs = session()->getFlashdata('inputs');
                    $errors = session()->getFlashdata('errors');
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
                    <div class="card">
                        <form action="/admin/produk/update" method="post" enctype="multipart/form-data">
                            <div class="card-header">Form Edit Produk</div>
                            <div class="card-body">
                                <?php echo form_hidden('id_produk', $produk['id_produk']) ?>
                                <?php echo form_hidden('old_gambar_produk', $produk['gambar_produk']) ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <img src="<?= base_url('uploads/' . $produk['gambar_produk']) ?>" width="475px" alt="" id="gambar_preview">
                                            <label for="gambar_produk">Ganti gambar</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="gambar_produk" id="gambar_produk" onchange="previewFoto()">
                                                <label class="custom-file-label" for="gambar_produk">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="id_kategori">Kategori</label>
                                            <select name="id_kategori" id="id_kategori" class="form-control">
                                                <?php foreach ($kategori as $key => $data) { ?>
                                                    <option value="<?= $key ?>" <?= $key == $produk['id_kategori'] ? 'selected' : '' ?>>
                                                        <?= $data ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_produk">Nama produk</label>
                                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama produk" value="<?= $produk['nama_produk'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_produk">Harga</label>
                                            <input type="number" class="form-control" name="harga_produk" id="harga_produk" placeholder="Harga produk" value="<?= $produk['harga_produk'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="">Pilih Status</option>
                                                <option value="Active" <?= $produk['status'] === 'Active' ? 'selected' : '' ?>>
                                                    Active
                                                </option>
                                                <option value="Inactive" <?= $produk['status'] === 'Inactive' ? 'selected' : '' ?>>
                                                    Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10"><?= $produk['deskripsi'] ?>
                                        </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="/admin/produk" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('_partials/footer'); ?>