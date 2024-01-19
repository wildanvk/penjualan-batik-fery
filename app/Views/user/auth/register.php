<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register User</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('themes'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('themes'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('themes'); ?>/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Register User</b>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silakan masukkan data</p>
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
                <form action="/user/create" method="post">
                    <label class="d-block" for="nama">Nama</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <label class="d-block" for="email">Email</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <label class="d-block" for="">Jenis Kelamin</label>
                    <div class="input-group mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki">
                            <label class="form-check-label" for="laki-laki">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan">
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>
                    </div>
                    <label class="d-block" for="telepon">Telepon</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="telepon" placeholder="Telepon" name="telepon">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <label class="d-block" for="password">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col my-2">
                            <button type="submit" class="btn btn-primary btn-block">Daftar akun</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->

                <div class="my-2">
                    <p class="text-center">Belum mempunyai akun? <a href="/user/register">Daftar sekarang</a></p>
                </div>
            </div>
            <!-- /.login-card-body -->

        </div>
    </div>
    <!-- /.login-box -->
    <div class="mt-3">
        <a href="/" class="text-center">Kembali</a>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('themes'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('themes'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('themes'); ?>/dist/js/adminlte.min.js"></script>

</body>

</html>