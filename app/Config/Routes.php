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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
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
// $routes->get('/', 'Home::index');
$routes->get('/', 'Dashboard::index');

$routes->group('', ['filter' => 'role:administrator'], function ($routes) {
    $routes->get('users', 'users::index');
    $routes->get('users/add', 'users::create');
    $routes->get('users/setPassword/(:segment)', 'users::setPessword/$1');
    $routes->get('users/user/(:segment)', 'users::user/$1');
    $routes->get('users/update/(:segment)', 'users::update/$1');
    $routes->delete('users/(:num)', 'users::delete/$1');

    $routes->get('desa', 'konfigurasi::desa');
    $routes->get('perangkat', 'konfigurasi::perangkat');
    $routes->add('perangkat', 'konfigurasi::insert');
    $routes->delete('perangkat/(:num)', 'konfigurasi::delete/$1');
    $routes->get('perangkat/update/(:segment)', 'Konfigurasi::update_perangkat/$1');
});

$routes->get('profile', 'users::profile');

$routes->get('penduduk', 'Kependudukan::penduduk');
$routes->delete('penduduk/(:num)', 'Kependudukan::delete/$1');
$routes->get('penduduk/add', 'Kependudukan::create');
$routes->get('penduduk/detail/(:segment)', 'Kependudukan::detail/$1');
$routes->get('penduduk/update/(:segment)', 'Kependudukan::update/$1');
$routes->get('penduduk/import', 'Kependudukan::import');

$routes->get('keluarga', 'Kependudukan::keluarga');
$routes->get('/kartu/(:segment)', 'Kependudukan::kartu/$1');
$routes->get('keluarga/update/(:segment)', 'Kependudukan::update_kk/$1');
$routes->delete('kartu/(:num)', 'Kependudukan::delete_kk/$1');

$routes->get('outgoing', 'Outgoing::index');
$routes->get('outgoing/detail/(:segment)', 'Outgoing::detail/$1');

$routes->get('persuratan/bedanama', 'Bedanama::index');
$routes->get('persuratan/bidikmisi', 'Bidikmisi::index');
$routes->get('persuratan/domisili', 'Domisili::index');
$routes->get('persuratan/keterangan', 'Keterangan::index');
$routes->get('persuratan/kematian', 'Kematian::index');
$routes->get('persuratan/pengantar', 'Pengantar::index');
$routes->get('persuratan/sktm', 'Sktm::index');

$routes->resource('api/autofill', ['controller' => 'Api\autofill']);



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
