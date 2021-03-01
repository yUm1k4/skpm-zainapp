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
$routes->post('home/kirimEmail', 'Home::kirimEmail');
$routes->get('ketentuan', 'Home::ketentuan');



// ### ---> Back End
// Notif
$routes->post('notif/kirimNotif', 'Notif::kirimNotif');

// Dashboard
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'role:Admin,Petugas']);

// My Profile (Admin)
$routes->get('/admin-profile/(:num)', 'AdminProfile::index/$1', ['filter' => 'role:Admin']);
$routes->post('/admin-profile/update/(:num)', 'AdminProfile::update/$1', ['filter' => 'role:Admin']);
$routes->post('/admin-profile/updateFoto/(:num)', 'AdminProfile::updateFoto/$1', ['filter' => 'role:Admin']);
$routes->post('/admin-profile/change-password/(:num)/(:any)', 'AdminProfile::changePassword/$1/$2', ['filter' => 'role:Admin']);

// My Profile (Petugas)
$routes->get('/petugas-profile/(:num)', 'PetugasProfile::index/$1', ['filter' => 'role:Petugas']);
$routes->post('/petugas-profile/update/(:num)', 'PetugasProfile::update/$1', ['filter' => 'role:Petugas']);
$routes->post('/petugas-profile/updateFoto/(:num)', 'PetugasProfile::updateFoto/$1', ['filter' => 'role:Petugas']);
$routes->post('/petugas-profile/change-password/(:num)/(:any)', 'PetugasProfile::changePassword/$1/$2', ['filter' => 'role:Petugas']);

// Data Admin
$routes->get('/admin', 'Admin::index', ['filter' => 'role:Admin']);
$routes->get('/admin/create', 'Admin::create', ['filter' => 'role:Admin']);
$routes->post('/admin', 'Admin::save', ['filter' => 'role:Admin']);
$routes->get('/admin/delete/(:num)/(:any)', 'Admin::delete/$1/$2', ['filter' => 'role:Admin']);

// Data Petugas
$routes->get('/petugas', 'Petugas::index', ['filter' => 'role:Admin']);
$routes->get('/petugas/create', 'Petugas::create', ['filter' => 'role:Admin']);
$routes->post('/petugas', 'Petugas::save', ['filter' => 'role:Admin']);
$routes->get('/petugas/delete/(:num)/(:any)', 'Petugas::delete/$1/$2', ['filter' => 'role:Admin']);
$routes->get('/petugas/edit/(:num)', 'Petugas::edit/$1', ['filter' => 'role:Admin']);
$routes->post('/petugas/update/(:num)', 'Petugas::update/$1', ['filter' => 'role:Admin']);
$routes->post('/petugas/delete/(:num)/(:any)', 'Petugas::delete/$1', ['filter' => 'role:Admin']);

// Data Masyarakat
$routes->get('/masyarakat', 'Masyarakat::index', ['filter' => 'role:Admin'], ['as' => 'masyarakat']);
$routes->get('/masyarakat/create', 'Masyarakat::create', ['filter' => 'role:Admin']);
$routes->post('/masyarakat', 'Masyarakat::save', ['filter' => 'role:Admin']);
$routes->post('/masyarakat/delete/(:num)', 'Masyarakat::delete/$1', ['filter' => 'role:Admin']);
$routes->post('/masyarakat/bannedForm', 'Masyarakat::bannedForm', ['filter' => 'role:Admin']);
$routes->post('/masyarakat/banned', 'Masyarakat::banned', ['filter' => 'role:Admin']);
$routes->post('/masyarakat/unban/(:num)', 'Masyarakat::unban/$1', ['filter' => 'role:Admin']);

// Data Semua Pengguna
$routes->get('/all-user', 'Alluser::index', ['filter' => 'role:Admin']);

// Pengaduan
$routes->get('/pengaduan', 'Pengaduan::index', ['filter' => 'role:Admin,Petugas']);
$routes->get('/pengaduan/create', 'Pengaduan::create', ['filter' => 'role:Admin,Petugas']);
$routes->get('/pengaduan/balas/(:any)', 'Pengaduan::balas/$1', ['filter' => 'role:Admin,Petugas']);
$routes->post('/pengaduan/balas/(:num)/(:any)/(:num)', 'Pengaduan::kirimBalasan/$1/$2/$3', ['filter' => 'role:Admin,Petugas']);
$routes->post('/pengaduan/delete/(:num)/(:any)', 'Pengaduan::delete/$1/$2', ['filter' => 'role:Admin,Petugas']);
$routes->post('/pengaduan/formSelesai/(:num)', 'Pengaduan::formSelesai/$1', ['filter' => 'role:Admin,Petugas']);
$routes->post('/pengaduan/updateSelesai', 'Pengaduan::updateSelesai', ['filter' => 'role:Admin,Petugas']);
$routes->post('/pengaduan/formArsip/(:num)', 'Pengaduan::formArsip/$1', ['filter' => 'role:Admin,Petugas']);
$routes->post('/pengaduan/updateArsip', 'Pengaduan::updateArsip', ['filter' => 'role:Admin,Petugas']);

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

// Contact Us
$routes->get('contact', 'Contact::index', ['filter' => 'role:Admin,Petugas']);

// Testimoni
$routes->get('testimoni', 'Testimoni::index', ['filter' => 'role:Admin,Petugas']);
$routes->get('testimoni/formtambah', 'Testimoni::formtambah', ['filter' => 'role:Admin,Petugas']);
$routes->post('testimoni/simpandata', 'Testimoni::simpandata', ['filter' => 'role:Admin,Petugas']);
$routes->post('testimoni/getUsers', 'Testimoni::getUsers', ['filter' => 'role:Admin,Petugas']);
$routes->post('testimoni/formedit', 'Testimoni::formedit', ['filter' => 'role:Admin,Petugas']);
$routes->post('testimoni/updatedata', 'Testimoni::updatedata', ['filter' => 'role:Admin,Petugas']);
$routes->post('testimoni/delete', 'Testimoni::delete', ['filter' => 'role:Admin,Petugas']);

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

// Settings
$routes->get('setting', 'Setting::index', ['filter' => 'role:Admin']);
$routes->get('setting/ambildata', 'Setting::ambildata', ['filter' => 'role:Admin']);
$routes->post('setting/update', 'Setting::update', ['filter' => 'role:Admin']);
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
