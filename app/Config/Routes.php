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
// user 
$routes->get('dashboard/user', "User::index");
$routes->get('dashboard/user/create', "User::create");
$routes->post('dashboard/user/store', "User::store");
$routes->get('dashboard/user/edit/(:any)', "User::edit/$1");
$routes->post('dashboard/user/update/(:any)', "User::update/$1");
$routes->delete('dashboard/user/delete/(:any)', "User::delete/$1");

$routes->get('dashboard/kategori', "Kategori::index");
$routes->get('dashboard/kategori/create', "Kategori::create");
$routes->post('dashboard/kategori/store', "Kategori::store");
$routes->get('dashboard/kategori/edit/(:any)', "Kategori::edit/$1");
$routes->post('dashboard/kategori/update/(:any)', "Kategori::update/$1");
$routes->get('dashboard/kategori/delete/(:any)', "Kategori::delete/$1");


$routes->get('dashboard/jenis-transaksi', "JenisTransaksi::index");
$routes->get('dashboard/jenis-transaksi/create', "JenisTransaksi::create");
$routes->post('dashboard/jenis-transaksi/store', "JenisTransaksi::store");
$routes->get('dashboard/jenis-transaksi/edit/(:any)', "JenisTransaksi::edit/$1");
$routes->post('dashboard/jenis-transaksi/update/(:any)', "JenisTransaksi::update/$1");
$routes->get('dashboard/jenis-transaksi/delete/(:any)', "JenisTransaksi::delete/$1");


$routes->get('dashboard/berita', "Berita::index");
$routes->get('dashboard/berita/create', "Berita::create");
$routes->post('dashboard/berita/store', "Berita::store");
$routes->get('dashboard/berita/edit/(:any)', "Berita::edit/$1");
$routes->post('dashboard/berita/update/(:any)', "Berita::update/$1");
$routes->get('dashboard/berita/delete/(:any)', "Berita::delete/$1");


$routes->get('dashboard/visi-misi', "VisiMisi::index");
$routes->post('dashboard/visi-misi', "VisiMisi::store");

$routes->get('/404_override', function () {
    echo view("auth/user");
});
// $routes->get('translate_uri_dashes') = FALSE;
