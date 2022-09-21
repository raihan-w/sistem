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

$routes->get('konfigurasi/profile', 'konfigurasi::profile');

$routes->get('penduduk', 'Kependudukan::penduduk');
$routes->delete('penduduk/(:num)', 'Kependudukan::delete/$1');
$routes->get('penduduk/tambah', 'Kependudukan::create');
$routes->get('penduduk/detail/(:segment)', 'Kependudukan::detail/$1');
$routes->get('penduduk/update/(:segment)', 'Kependudukan::update/$1');
$routes->get('penduduk/import', 'Kependudukan::import');

$routes->get('keluarga', 'Kependudukan::keluarga');
$routes->get('/kartu/(:segment)', 'Kependudukan::kartu/$1');
$routes->get('keluarga/update/(:segment)', 'Kependudukan::update_kk/$1');
$routes->delete('kartu/(:num)', 'Kependudukan::delete_kk/$1');

$routes->get('outgoing', 'Outgoing::index');

$routes->get('persuratan/beda-nama', 'Persuratan::form_bedanama');
$routes->get('persuratan/bidik-misi', 'Persuratan::form_bidikmisi');
$routes->get('persuratan/form_domisili', 'Persuratan::form_domisili');
$routes->get('persuratan/form_keterangan', 'Persuratan::form_keterangan');
$routes->get('persuratan/form_sktm', 'Persuratan::form_sktm');
$routes->get('persuratan/form_kematian', 'Persuratan::form_kematian');
$routes->get('persuratan/form_pengantar', 'Persuratan::form_pengantar');

$routes->get('persuratan/bedanama', 'Bedanama::index');
$routes->get('persuratan/bidikmisi', 'Bidikmisi::index');
$routes->get('persuratan/domisili', 'Domisili::index');

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
