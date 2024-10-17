<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'auth']);

$routes->get('auth', 'Auth::index');
$routes->post('auth/login', 'Auth::login');
$routes->get('auth/logout', 'Auth::logout');

$routes->get('/alternatif', 'Alternatif::index', ['filter' => 'auth']);
$routes->get('/alternatif/getModalUpload', 'Alternatif::getModalUpload', ['filter' => 'auth']);
$routes->get('/alternatif/getModalCreate', 'Alternatif::getModalCreate', ['filter' => 'auth']);
$routes->get('/alternatif/getModalEdit/(:segment)', 'Alternatif::getModalEdit/$1', ['filter' => 'auth']);
$routes->post('/alternatif/store', 'Alternatif::store', ['filter' => 'auth']);
$routes->post('/alternatif/update', 'Alternatif::update', ['filter' => 'auth']);
$routes->post('/alternatif/upload', 'Alternatif::upload', ['filter' => 'auth']);
$routes->post('/alternatif/removeFile', 'Alternatif::removeFile', ['filter' => 'auth']);
$routes->get('/alternatif/delete', 'Alternatif::delete', ['filter' => 'auth']);


$routes->get('/user', 'User::index', ['filter' => 'auth']);
$routes->get('/user/create', 'User::create', ['filter' => 'auth']);
$routes->post('/user/store', 'User::store', ['filter' => 'auth']);
$routes->post('/user/update', 'User::update', ['filter' => 'auth']);
$routes->get('/user/getModalCreate', 'User::getModalCreate', ['filter' => 'auth']);
$routes->get('/user/getModalEdit/(:segment)', 'User::getModalEdit/$1', ['filter' => 'auth']);
$routes->get('/user/delete', 'User::delete', ['filter' => 'auth']);


$routes->get('/perhitungan', 'Perhitungan::index', ['filter' => 'auth']);
$routes->get('/perhitungan/perhitungan-x', 'Perhitungan::x', ['filter' => 'auth']);
$routes->get('/perhitungan/perhitungan-n', 'Perhitungan::n', ['filter' => 'auth']);
$routes->get('/perhitungan/perhitungan-w', 'Perhitungan::w', ['filter' => 'auth']);
$routes->get('/perhitungan/perhitungan-v', 'Perhitungan::v', ['filter' => 'auth']);
$routes->get('/perhitungan/perhitungan-g', 'Perhitungan::g', ['filter' => 'auth']);
$routes->get('/perhitungan/perhitungan-q', 'Perhitungan::q', ['filter' => 'auth']);
$routes->get('/perhitungan/hasil', 'Perhitungan::hasil', ['filter' => 'auth']);


$routes->get('/penilaian', 'Penilaian::index', ['filter' => 'auth']);
$routes->post('/penilaian/store', 'Penilaian::store', ['filter' => 'auth']);
$routes->post('/penilaian/update', 'Penilaian::update', ['filter' => 'auth']);
$routes->post('/penilaian/dump', 'Penilaian::dump', ['filter' => 'auth']);
$routes->get('/penilaian/modalEdit', 'Penilaian::modalEdit', ['filter' => 'auth']);
$routes->get('/penilaian/modalInput', 'Penilaian::modalInput', ['filter' => 'auth']);
$routes->get('/penilaian/getModalUpload', 'Penilaian::getModalUpload', ['filter' => 'auth']);
$routes->get('/penilaian/download', 'Penilaian::download', ['filter' => 'auth']);


$routes->get('/kriteria', 'Kriteria::index', ['filter' => 'auth']);
$routes->get('/kriteria/create', 'Kriteria::create', ['filter' => 'auth']);
$routes->get('/kriteria/getModalUpload', 'Kriteria::getModalUpload', ['filter' => 'auth']);
$routes->get('/kriteria/getModalCreate', 'Kriteria::getModalCreate', ['filter' => 'auth']);
$routes->get('/kriteria/getModalEdit/(:segment)', 'Kriteria::getModalEdit/$1', ['filter' => 'auth']);
$routes->post('/kriteria/store', 'Kriteria::store', ['filter' => 'auth']);
$routes->post('/kriteria/update', 'Kriteria::update', ['filter' => 'auth']);
$routes->post('/kriteria/upload', 'Kriteria::upload', ['filter' => 'auth']);
$routes->post('/kriteria/removeFile', 'Kriteria::removeFile', ['filter' => 'auth']);
$routes->get('/kriteria/delete', 'Kriteria::delete', ['filter' => 'auth']);

$routes->get('/subkriteria', 'Subkriteria::index', ['filter' => 'auth']);
$routes->get('/subkriteria/getModalEdit/(:segment)', 'Subkriteria::getModalEdit/$1', ['filter' => 'auth']);
$routes->post('/subkriteria/update', 'Subkriteria::update', ['filter' => 'auth']);
$routes->get('/subkriteria/delete', 'Subkriteria::delete', ['filter' => 'auth']);
$routes->get('/subkriteria/getModalUpload', 'Subkriteria::getModalUpload', ['filter' => 'auth']);
$routes->post('/subkriteria/upload', 'Subkriteria::upload', ['filter' => 'auth']);
$routes->post('/subkriteria/removeFile', 'Subkriteria::removeFile', ['filter' => 'auth']);