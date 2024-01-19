<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo base_url('/'); ?>" class="brand-link">
        <img src="<?php echo base_url('themes/dist'); ?>/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIP Batik</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('themes/dist'); ?>/img/user8-128x128.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a class="d-block">Admin</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/admin/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">Data Master</li>
                <li class="nav-item">
                    <a href="/admin/kategori" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/produk" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Produk</p>
                    </a>
                </li>
                <li class="nav-header">Penjualan</li>
                <li class="nav-item">
                    <a href="/admin/transaksi" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Transaksi</p>
                    </a>
                </li>
                <li class="nav-header">Laporan</li>
                <li class="nav-item">
                    <a href="/admin/transaksi" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Transaksi</p>
                    </a>
                </li>
                <li class="nav-header">Akun</li>
                <li class="nav-item">
                    <a href="/admin/auth/logout" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>