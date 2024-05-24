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
    $routes->get('santri/create', "santri::create");
    $routes->post('santri/store', "santri::store");
    $routes->get('santri/edit/(:any)', "santri::edit/$1");
    $routes->post('santri/update/(:any)', "santri::update/$1");
});

$routes->delete('santri/delete/(:any)', "santri::delete/$1");

$routes->get('/404_override', function () {
    echo view("auth/user");
});
// $routes->get('translate_uri_dashes') = FALSE;
