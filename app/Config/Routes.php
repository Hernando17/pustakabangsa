<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('home');
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

//Routes untuk Home
$routes->get('/', 'Home::home');
$routes->get('/Home/opsi', 'Home::opsi');


//Login
$routes->get('/Login', 'Login::index');

//Routes untuk Dashboard
$routes->get('/Home/index', 'Home::index'); 
$routes->get('/Home/Dashboard', 'Home::dashboard'); 
$routes->get('/Home/create', 'Home::create'); 
$routes->get('/Home/edit/(:segment)', 'Home::edit/$1'); 
$routes->get('/Home/editpassword/(:segment)', 'Home::editpassword/$1'); 
$routes->delete('/Home/(:num)', 'Home::delete/$1'); 
$routes->get('/Home/elibrarydetail/(:any)', 'Home::elibrarydetail/$1');
$routes->get('/Home/(:any)', 'Home::detail/$1');

//Routes untuk E-book
$routes->get('/Buku/index', 'Buku::index'); 
$routes->get('/Buku/create', 'Buku::create'); 
$routes->get('/Buku/edit/(:segment)', 'Buku::edit/$1'); 
$routes->delete('/Buku/(:num)', 'Buku::delete/$1'); 
$routes->get('/Buku/(:any)', 'Buku::detail/$1');


//Routes untuk Book
$routes->get('/Library/index', 'Library::index'); 
$routes->get('/Library/create', 'Library::create'); 
$routes->get('/Library/edit/(:segment)', 'Library::edit/$1'); 
$routes->delete('/Library/(:num)', 'Library::delete/$1'); 
$routes->get('/Library/(:any)', 'Library::detail/$1');


//Routes untuk List Pustakawan
$routes->get('/Pustakawan/index', 'Pustakawan::index'); 
$routes->get('/Pustakawan/create', 'Pustakawan::create'); 
$routes->get('/Pustakawan/edit/(:segment)', 'Pustakawan::edit/$1'); 
$routes->delete('/Pustakawan/(:num)', 'Pustakawan::delete/$1'); 
$routes->get('/Pustakawan/(:any)', 'Pustakawan::detail/$1');


//Routes untuk Organisasi
$routes->get('/Organisasi/index', 'Organisasi::index'); 
$routes->get('/Organisasi/create', 'Organisasi::create'); 
$routes->get('/Organisasi/edit/(:segment)', 'Organisasi::edit/$1'); 
$routes->delete('/Organisasi/(:num)', 'Organisasi::delete/$1'); 
$routes->get('/Organisasi/(:any)', 'Organisasi::detail/$1');






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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
