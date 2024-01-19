<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login User</title>
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
            <b>Login User</b>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silakan masukkan email dan password</p>
                <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
                <?php endif; ?>
                <form action="/user/verification" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col my-2">
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
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
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('themes'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('themes'); ?>/dist/js/adminlte.min.js"></script>

    <script>
    <?php if (session()->getFlashdata('createAccount')) { ?>
    Swal.fire({
        icon: 'success',
        title: 'Register Berhasil',
        text: '<?= session()->getFlashdata('createAccount') ?>',
        showConfirmButton: true,
        timer: 3000
    })
    <?php } ?>
    </script>

</body>

</html>