<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');


// page login
$routes->post('/login', 'Login::index');
$routes->get('/login', 'Login::index');
$routes->get('/not-login', 'Login::notLogin');
$routes->get('/logout', 'Login::logout');
$routes->post('/login/auth', 'Login::auth');



// page admin
$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
	$routes->get('', 'Admin::index');
	$routes->get('admin', 'Admin::admintest');
	$routes->get('github', 'Admin::github');
	$routes->get('tentang', 'Admin::tentang');
	$routes->get('ajax-load-data', 'Admin::ajaxLoadData');
	$routes->post('post', 'Admin::adminPost');
	$routes->get('create-user', 'Admin::adminPagePost');
	$routes->get('edit/(:num)', 'Admin::getEdit/$1');
	$routes->post('update/(:num)', 'Admin::adminUpdate/$1');
	$routes->get('delete/(:num)', 'Admin::adminDelete/$1');
});

// page user
$routes->group('user', ['filter' => 'auth'], static function ($routes) {
	$routes->get('', 'UserNormal::index');
	$routes->get('user', 'UserNormal::usertest');
	$routes->get('github', 'UserNormal::github');
	$routes->get('tentang', 'UserNormal::tentang');
	$routes->get('ajax-load-data', 'UserNormal::ajaxLoadData');
	$routes->get('create-user', 'UserNormal::userPagePost');
	$routes->post('post', 'UserNormal::userPost');
	$routes->get('edit/(:num)', 'UserNormal::getEdit/$1');
	$routes->post('update/(:num)', 'UserNormal::userUpdate/$1');
	$routes->get('delete/(:num)', 'UserNormal::userDelete/$1');
});



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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
