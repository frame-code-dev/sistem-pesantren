<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::login');
// $routes->get('default_controller') = 'auth/login';
$routes->get('/login', "Auth::login", ['as' => 'login']);
$routes->post('/login', 'Auth::loginPost', ['as' => 'loginPost']);
$routes->get('/logout', "Auth::logout");
// dashboard 
$routes->get('/dashboard', "Dashboard::index", ['as' => 'dashboard']);

$routes->group('dashboard', function ($routes) {
    // user 
    $routes->get('user', "User::index");
    $routes->get('user/create', "User::create");
    $routes->post('user/store', "User::store");
    $routes->get('user/edit/(:any)', "User::edit/$1");
    $routes->post('user/update/(:any)', "User::update/$1");
    $routes->delete('user/delete/(:any)', "User::delete/$1");

    // santri 
    $routes->get('santri', "Santri::index");
    $routes->get('santri/create', "Santri::create");
    $routes->post('santri/store', "Santri::store");
    $routes->get('santri/edit/(:any)', "Santri::edit/$1");
    $routes->post('santri/update/(:any)', "Santri::update/$1");
    $routes->get('santri/delete/(:any)', "Santri::delete/$1");

    // alumni
    $routes->get('alumni', "Santri::alumni");
    $routes->post('alumni/add', "Santri::addAlumni");
    $routes->get('alumni/update/(:any)', "Santri::updateAktif/$1");

    // kategori
    $routes->get('kategori', "Kategori::index");
    $routes->get('kategori/create', "Kategori::create");
    $routes->post('kategori/store', "Kategori::store");
    $routes->get('kategori/edit/(:any)', "Kategori::edit/$1");
    $routes->post('kategori/update/(:any)', "Kategori::update/$1");
    $routes->get('kategori/delete/(:any)', "Kategori::delete/$1");

    // jenis transaksi
    $routes->get('jenis-transaksi', "JenisTransaksi::index");
    $routes->get('jenis-transaksi/create', "JenisTransaksi::create");
    $routes->post('jenis-transaksi/store', "JenisTransaksi::store");
    $routes->get('jenis-transaksi/edit/(:any)', "JenisTransaksi::edit/$1");
    $routes->post('jenis-transaksi/update/(:any)', "JenisTransaksi::update/$1");
    $routes->get('jenis-transaksi/delete/(:any)', "JenisTransaksi::delete/$1");

    //berita
    $routes->get('berita', "Berita::index");
    $routes->get('berita/create', "Berita::create");
    $routes->post('berita/store', "Berita::store");
    $routes->get('berita/edit/(:any)', "Berita::edit/$1");
    $routes->post('berita/update/(:any)', "Berita::update/$1");
    $routes->get('berita/delete/(:any)', "Berita::delete/$1");

    //pendaftaran
    $routes->get('pendaftaran', "Transaksi::index");

    //visi-misi
    $routes->get('visi-misi', "VisiMisi::index");
    $routes->post('visi-misi', "VisiMisi::store");

    //peraturan
    $routes->get('peraturan', "Peraturan::index");
    $routes->post('peraturan/store', "Peraturan::store");
});


$routes->get('/404_override', function () {
    echo view("auth/user");
});
// $routes->get('translate_uri_dashes') = FALSE;
