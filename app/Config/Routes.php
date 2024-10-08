<?php

use App\Controllers\Berita;
use App\Controllers\BeritaController;
use App\Controllers\PSBController;
use App\Controllers\TentangAlumniController;
use App\Controllers\ExportController;
use App\Controllers\TentangPondokController;
use App\Controllers\WelcomeController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// LANDING PAGE 
$routes->get('/', [WelcomeController::class, 'index']);
// Berita
$routes->get('/berita', [BeritaController::class, 'index']);
$routes->get('/berita/detail/(:any)', [BeritaController::class, 'detail/$1']);
// Tentang Pondok 
$routes->get('/sejarah', [TentangPondokController::class, 'sejarah']);
$routes->get('/visi-misi', [TentangPondokController::class, 'visiMisi']);
$routes->get('/peraturan', [TentangPondokController::class, 'peraturan']);
// Tentang Alumni  
$routes->get('tentang-alumni', [TentangAlumniController::class, 'index']);
// Pendaftaran Online 
$routes->get('psb', [PSBController::class, 'index']);
$routes->get('psb/create', [PSBController::class, 'create']);
$routes->post('psb/create/store', [PSBController::class, 'store']);

$routes->get('/login', 'Auth::login');
// $routes->get('default_controller') = 'auth/login';
$routes->get('/login', "Auth::login", ['as' => 'login']);
$routes->post('/login', 'Auth::loginPost', ['as' => 'loginPost']);
$routes->get('/logout', "Auth::logout");
// dashboard 

$routes->group('dashboard', ['filter' => "auth"], function ($routes) {
    $routes->get('/', "Dashboard::index", ['as' => 'dashboard']);
    //profile
    $routes->get('profile', "User::profile");
    $routes->post('profile-post', "User::profilePost");
    // user 
    $routes->get('user', "User::index");
    $routes->get('user/create', "User::create");
    $routes->post('user/store', "User::store");
    $routes->get('user/edit/(:any)', "User::edit/$1");
    $routes->post('user/update/(:any)', "User::update/$1");
    $routes->get('user/delete/(:any)', "User::delete/$1");



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


    $routes->group('/', ['filter' => "roleAkses:admin_santri,super_admin"], function ($routes) {
        // santri 
        $routes->get('santri', "Santri::index");
        $routes->get('santri/create', "Santri::create");
        $routes->post('santri/store', "Santri::store");
        $routes->get('santri/edit/(:any)', "Santri::edit/$1");
        $routes->post('santri/update/(:any)', "Santri::update/$1");
        $routes->get('santri/delete/(:any)', "Santri::delete/$1");
        $routes->get('santri/exportSantri', [ExportController::class, "exportSantri"]);

        // alumni
        $routes->get('alumni', "Santri::alumni");
        $routes->post('alumni/add', "Santri::addAlumni");
        $routes->get('alumni/update/(:any)', "Santri::updateAktif/$1");

        //pendaftaran
        $routes->get('pendaftaran', "Transaksi::index");
        $routes->get('pendaftaran-add', "Transaksi::create");
        $routes->post('pendaftaran-post', "Transaksi::store");
        $routes->get('pendaftaran/edit/(:any)', "Transaksi::edit/$1");
        $routes->post('pendaftaran/update/(:any)', "Transaksi::update/$1");

        //pendaftaran ulang
        $routes->get('pendaftaran-ulang', "Transaksi::pendaftaranUlang");
        $routes->get('pendaftaran-ulang-add', "Transaksi::pendaftaranUlangCreate");
        $routes->post('pendaftaran-ulang-post', "Transaksi::pendaftaranUlangStore");
        $routes->get('pendaftaran-ulang/edit/(:any)', "Transaksi::pendaftaranUlangEdit/$1");
        $routes->post('pendaftaran-ulang/update/(:any)', "Transaksi::pendaftaranUlangUpdate/$1");
    });


    //visi-misi
    $routes->get('visi-misi', "VisiMisi::index");
    $routes->post('visi-misi', "VisiMisi::store");

    $routes->group('/', ['filter' => "roleAkses:admin_keuangan,super_admin"], function ($routes) {
        //pengeluaran
        $routes->get('pengeluaran', "Transaksi::indexPengeluaran");
        $routes->get('pengeluaran-add', "Transaksi::createPengeluaran");
        $routes->post('pengeluaran-post', "Transaksi::storePengeluaran");
        $routes->get('pengeluaran/edit/(:any)', "Transaksi::editPengeluaran/$1");
        $routes->post('pengeluaran/update/(:any)', "Transaksi::updatePengeluaran/$1");
        $routes->get('pengeluaran/delete/(:any)', "Transaksi::deletePengeluaran/$1");

        //bulanan
        $routes->get('bulanan', "Transaksi::indexBulanan");
        $routes->get('bulanan-add', "Transaksi::createBulanan");
        $routes->post('bulanan-post', "Transaksi::storeBulanan");
        $routes->get('bulananSantri/(:any)/(:any)/(:any)', "Transaksi::cekBulananSantri/$1/$2/$3");
        $routes->get('bulanan/edit/(:any)', "Transaksi::editBulanan/$1");
        $routes->post('bulanan/update/(:any)', "Transaksi::updateBulanan/$1");

        //laporan bulanan
        $routes->get('laporan-bulanan', "LaporanTahunan::indexBulanan");
        $routes->get('laporan-bulanan-export', "LaporanTahunan::downloadBulanan");

        //laporan tahunan
        $routes->get('laporan-tahunan', "LaporanTahunan::index");
        $routes->get('laporan-tahunan-export', "LaporanTahunan::download");

        //Tabungan santri
        $routes->get('tabungan-santri', "TabunganSantriController::index");
        $routes->get('tabungan-santri/(:any)/(:any)/(:any)', "TabunganSantriController::cetak/$1/$2/$3");
        $routes->post('add-tabungan-santri', "TabunganSantriController::store");
        $routes->post('edit-tabungan-santri/(:any)', "TabunganSantriController::update/$1");

        // Pemasukan lainnya
        $routes->get('pemasukan-lainnya', "Transaksi::indexPemasukanLainnya");
        $routes->get('add-pemasukan-lainnya', "Transaksi::addPemasukanLainnya");
        $routes->post('add-pemasukan-lainnya-post', "Transaksi::postPemasukanLainnya");
        $routes->get('pemasukan-lainnya/edit/(:any)', "Transaksi::editPemasukanLainnya/$1");
        $routes->post('pemasukan-lainnya/update/(:any)', "Transaksi::updatePemasukanLainnya/$1");
        $routes->get('pemasukan-lainnya/delete/(:any)', "Transaksi::deletePemasukanLainnya/$1");
    });

    //peraturan
    $routes->get('peraturan', "Peraturan::index");
    $routes->post('peraturan/store', "Peraturan::store");
});


$routes->get('/404_override', function () {
    echo view("auth/user");
});
// $routes->get('translate_uri_dashes') = FALSE;
