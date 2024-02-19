<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/alternatif', 'Alternatif::index');
$routes->get('/alternatif/getModalUpload', 'Alternatif::getModalUpload');
$routes->post('/alternatif/upload', 'Alternatif::upload');
$routes->post('/alternatif/removeFile', 'Alternatif::removeFile');
$routes->get('/alternatif/delete', 'Alternatif::delete');


$routes->get('/user', 'User::index');


$routes->get('/perhitungan', 'Perhitungan::index');
$routes->get('/perhitungan/perhitungan-x', 'Perhitungan::x');
$routes->get('/perhitungan/perhitungan-n', 'Perhitungan::n');
$routes->get('/perhitungan/perhitungan-w', 'Perhitungan::w');
$routes->get('/perhitungan/perhitungan-v', 'Perhitungan::v');
$routes->get('/perhitungan/perhitungan-g', 'Perhitungan::g');
$routes->get('/perhitungan/perhitungan-q', 'Perhitungan::q');
$routes->get('/perhitungan/hasil', 'Perhitungan::hasil');


$routes->get('/penilaian', 'Penilaian::index');
$routes->post('/penilaian/store', 'Penilaian::store');
$routes->post('/penilaian/update', 'Penilaian::update');
$routes->post('/penilaian/dump', 'Penilaian::dump');
$routes->get('/penilaian/modalEdit', 'Penilaian::modalEdit');
$routes->get('/penilaian/modalInput', 'Penilaian::modalInput');


$routes->get('/kriteria', 'Kriteria::index');
$routes->get('/kriteria/create', 'Kriteria::create');
$routes->get('/kriteria/getModalUpload', 'Kriteria::getModalUpload');
$routes->post('/kriteria/upload', 'Kriteria::upload');
$routes->post('/kriteria/removeFile', 'Kriteria::removeFile');
$routes->get('/kriteria/delete', 'Kriteria::delete');

$routes->get('/subkriteria', 'Subkriteria::index');
$routes->get('/subkriteria/delete', 'Subkriteria::delete');
$routes->get('/subkriteria/getModalUpload', 'Subkriteria::getModalUpload');
$routes->post('/subkriteria/upload', 'Subkriteria::upload');
$routes->post('/subkriteria/removeFile', 'Subkriteria::removeFile');