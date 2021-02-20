<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// ### ---> Front End
// Home
$routes->get('/', 'Home::index');
$routes->post('/subscribe-email/(:num)/(:any)', 'Home::subscribeEmail/$1/$2');

// Lapor
$routes->get('lapor', 'Home::lapor', ['filter' => 'role:Masyarakat'], ['as' => 'lapor']);
$routes->post('lapor', 'Home::kirimLaporan', ['filter' => 'role:Masyarakat']);
$routes->get('laporan-saya/(:num)', 'Home::laporanSaya/$1', ['filter' => 'role:Masyarakat']);
$routes->get('laporan-detail/(:num)/(:any)', 'Home::laporanDetail/$1/$2', ['filter' => 'role:Masyarakat']);
$routes->get('cari-laporan', 'Home::cariLaporan', ['filter' => 'role:Masyarakat'], ['as' => 'lapor']);
$routes->post('/pengaduan/balasMasyarakat/(:num)/(:any)/(:num)', 'Pengaduan::kirimBalasanMasyarakat/$1/$2/$3', ['filter' => 'role:Masyarakat']);


// My Profile (Masyarakat)
$routes->get('/user-profile', 'UserProfile::index', ['filter' => 'role:Masyarakat']);
$routes->get('/user-profile/edit/(:num)', 'UserProfile::edit/$1', ['filter' => 'role:Masyarakat']);
$routes->post('/user-profile/update/(:num)', 'UserProfile::update/$1', ['filter' => 'role:Masyarakat']);
$routes->get('/user-profile/change-password/(:num)/(:any)', 'UserProfile::changePassword/$1/$2', ['filter' => 'role:Masyarakat']);
$routes->post('/user-profile/change-password/(:num)/(:any)', 'UserProfile::attemptChangePassword/$1/$2', ['filter' => 'role:Masyarakat']);

// Tentang Kami
$routes->get('tentang', 'Home::tentang');
$routes->get('hubungi', 'Home::hubungi');
$routes->get('ketentuan', 'Home::ketentuan');



// ### ---> Back End
// Notif
$routes->post('notif/kirimNotif', 'Notif::kirimNotif');

// -- Admin & Petugas
$routes->get('/profile', 'Profile::index', ['filter' => 'role:Admin,Petugas']);

// Dashboard
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'role:Admin,Petugas']);

// Data Admin
$routes->get('/admin', 'Admin::index', ['filter' => 'role:Admin']);
$routes->get('/admin/create', 'Admin::create', ['filter' => 'role:Admin']);
$routes->post('/admin', 'Admin::save', ['filter' => 'role:Admin']);
$routes->get('/admin/delete/(:num)/(:any)', 'Admin::delete/$1/$2', ['filter' => 'role:Admin']);

// Data Petugas
$routes->get('/petugas', 'Petugas::index', ['filter' => 'role:Admin']);

// Data Masyarakat
$routes->get('/masyarakat', 'Masyarakat::index', ['filter' => 'role:Admin'], ['as' => 'masyarakat']);
$routes->get('/masyarakat/create', 'Masyarakat::create', ['filter' => 'role:Admin']);
$routes->post('/masyarakat', 'Masyarakat::save', ['filter' => 'role:Admin']);
$routes->get('/masyarakat/edit/(:num)', 'Masyarakat::edit/$1', ['filter' => 'role:Admin']);
$routes->post('/masyarakat/update/(:num)', 'Masyarakat::update/$1', ['filter' => 'role:Admin']);
$routes->post('/masyarakat/delete/(:num)', 'Masyarakat::delete/$1', ['filter' => 'role:Admin']);

// Data Semua Pengguna
$routes->get('/all-user', 'Alluser::index', ['filter' => 'role:Admin']);

// Pengaduan
$routes->get('/pengaduan', 'Pengaduan::index', ['filter' => 'role:Admin,Petugas']);
$routes->get('/pengaduan/create', 'Pengaduan::create', ['filter' => 'role:Admin,Petugas']);
$routes->get('/pengaduan/balas/(:any)', 'Pengaduan::balas/$1', ['filter' => 'role:Admin,Petugas']);
$routes->post('/pengaduan/balas/(:num)/(:any)/(:num)', 'Pengaduan::kirimBalasan/$1/$2/$3', ['filter' => 'role:Admin,Petugas']);
$routes->post('/pengaduan/delete/(:num)/(:any)', 'Pengaduan::delete/$1/$2', ['filter' => 'role:Admin,Petugas']);

// Pengaduan Kategori
$routes->get('/pengaduan-kategori', 'KategoriPengaduan::index', ['filter' => 'role:Admin,Petugas']);
$routes->get('/pengaduan-kategori/ambildata', 'KategoriPengaduan::ambildata', ['filter' => 'role:Admin,Petugas']);
$routes->get('/pengaduan-kategori/formtambah', 'KategoriPengaduan::formtambah', ['filter' => 'role:Admin,Petugas']);
$routes->post('/pengaduan-kategori/simpandata', 'KategoriPengaduan::simpandata', ['filter' => 'role:Admin,Petugas']);
$routes->post('/pengaduan-kategori/formedit', 'KategoriPengaduan::formedit', ['filter' => 'role:Admin,Petugas']);
$routes->post('/pengaduan-kategori/updatedata', 'KategoriPengaduan::updatedata', ['filter' => 'role:Admin,Petugas']);
$routes->post('/pengaduan-kategori/hapus', 'KategoriPengaduan::hapus', ['filter' => 'role:Admin,Petugas']);

// Laporan
$routes->get('report', 'Laporan::index', ['filter' => 'role:Admin,Petugas']);
$routes->post('cetak', 'Laporan::cetak', ['filter' => 'role:Admin,Petugas']);

// Quotes
$routes->get('/quotes', 'Quotes::index', ['filter' => 'role:Admin']);
$routes->get('/quotes/index', 'Quotes::index', ['filter' => 'role:Admin']);
$routes->get('/quotes/ambildata', 'Quotes::ambildata', ['filter' => 'role:Admin']);
$routes->get('/quotes/formtambah', 'Quotes::formtambah', ['filter' => 'role:Admin']);
$routes->get('/quotes/simpandata', 'Quotes::simpandata', ['filter' => 'role:Admin']);
$routes->get('/quotes/formedit', 'Quotes::formedit', ['filter' => 'role:Admin']);
$routes->get('/quotes/updatedata', 'Quotes::updatedata', ['filter' => 'role:Admin']);
$routes->get('/quotes/hapus', 'Quotes::hapus', ['filter' => 'role:Admin']);

// Subscriber
$routes->get('/subscriber', 'Subscriber::index', ['filter' => 'role:Admin,Petugas']);
$routes->post('/subscriber/delete/(:num)', 'Subscriber::delete/$1', ['filter' => 'role:Admin,Petugas']);


/**
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
