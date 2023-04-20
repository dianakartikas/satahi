<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('');
$routes->setDefaultMethod('');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/nasabah/saldo/(:alphanum)', 'Home::cekSaldo');
$routes->get('/tambah-permintaan', 'Nasabah::tpermintaan');
$routes->get('/masuk', 'Home::masuk');
$routes->get('/beranda', 'Home::beranda', ['filter' => 'login']);
$routes->get('/sampah', 'Sampah::index', ['filter' => 'login']);
$routes->get('/nasabah', 'Nasabah::index', ['filter' => 'login']);
$routes->get('/pembelian', 'Transaksi::index', ['filter' => 'login']);
$routes->get('/pembelian/(:num)', 'Transaksi::invoice/$1', ['filter' => 'login']);
$routes->get('/penarikan/(:num)', 'Transaksi::invoicepenarikan/$1', ['filter' => 'login']);
$routes->get('/penarikan', 'Transaksi::penarikan', ['filter' => 'login']);
$routes->get('/nasabah/(:num)', 'Nasabah::detailNasabah/$1', ['filter' => 'login']);
$routes->get('/nasabah/print/(:num)', 'Nasabah::print/$1', ['filter' => 'login']);
$routes->get('/permintaan', 'Nasabah::permintaan', ['filter' => 'login']);
$routes->get('/password', 'Nasabah::permintaan', ['filter' => 'login']);





// $routes->get('/nasabah/(:alphanum)', 'Nasabah::kartuNasabah/$kode', ['filter' => 'login']);





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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
