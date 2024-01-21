<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(true);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Shop::index');


$routes->group('shop', function ($routes) {
    $routes->get('/', 'Shop::index');
    $routes->get('detail/(:segment)', 'Shop::detail/$1');
    $routes->get('cart', 'Shop::cart');
    $routes->get('tambah_keranjang/(:segment)', 'Shop::addToCart/$1');
    $routes->post('update_keranjang', 'Shop::updateCart/$1');
    $routes->get('hapus_keranjang/(:segment)', 'Shop::deleteCart/$1');
    $routes->post('checkout', 'Shop::checkout');
    $routes->get('riwayat_transaksi', 'Shop::riwayatTransaksi');
});

$routes->group('user', function ($routes) {
    $routes->get('/', 'User\Auth::index');
    $routes->get('login', 'User\Auth::index');
    $routes->post('verification', 'User\Auth::verification');
    $routes->get('register', 'User\Auth::register');
    $routes->post('create', 'User\Auth::create');
    $routes->get('logout', 'User\Auth::logout');
});

$routes->group('admin', function ($routes) {
    $routes->get('/', 'Auth::index');
    $routes->get('dashboard', 'Dashboard::index');

    // Auth
    $routes->group('auth', function ($routes) {
        $routes->get('/', 'Auth::index');
        $routes->get('login', 'Auth::index');
        $routes->post('verification', 'Auth::verification');
        $routes->get('logout', 'Auth::logout');
    });

    // Kategori
    $routes->get('kategori', 'Kategori::index');
    $routes->get('kategori/tambah', 'Kategori::create');
    $routes->post('kategori/insert', 'Kategori::store');
    $routes->get('kategori/edit/(:segment)', 'Kategori::edit/$1');
    $routes->post('kategori/update', 'Kategori::update/$1');
    $routes->get('kategori/delete/(:segment)', 'Kategori::delete/$1');

    // Produk
    $routes->get('produk', 'Produk::index');
    $routes->get('produk/show/(:segment)', 'Produk::show/$1');
    $routes->get('produk/tambah', 'Produk::create');
    $routes->post('produk/insert', 'Produk::store');
    $routes->get('produk/edit/(:segment)', 'Produk::edit/$1');
    $routes->post('produk/update', 'Produk::update/$1');
    $routes->get('produk/delete/(:segment)', 'Produk::delete/$1');

    $routes->get('transaksi', 'Transaksi::index');
    $routes->get('transaksi/show/(:segment)', 'Transaksi::show/$1');
    $routes->post('transaksi/update', 'Transaksi::update/$1');

    $routes->get('laporan', 'Laporan::index');
    $routes->post('laporan/cetak', 'Laporan::cetak');
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
