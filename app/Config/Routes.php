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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Dashboard
$routes->get('/admin/dashboard', 'DashboardController::index');

// Tentang Aplikasi
$routes->get('/admin/tentang-aplikasi', 'TentangAplikasiController::index');
$routes->get('/admin/tentang-aplikasi/add', 'TentangAplikasiController::add');
$routes->get('/admin/tentang-aplikasi/delete/(:num)', 'TentangAplikasiController::delete/$1');
$routes->post('/admin/tentang-aplikasi/add', 'TentangAplikasiController::save');
$routes->get('/admin/tentang-aplikasi/edit/(:num)', 'TentangAplikasiController::edit/$1');
$routes->patch('/admin/tentang-aplikasi/edit/(:num)', 'TentangAplikasiController::editSave/$1');

$routes->get('/admin/map-settings', 'MapSettingsController::index');
$routes->get('admin/map-settings/category', 'CategoryController::index');
$routes->get('admin/map-settings/category', 'CategoryController::index');
$routes->get('admin/map-settings/category/add', 'CategoryController::add');
$routes->post('admin/map-settings/category/add', 'CategoryController::save');
$routes->get('admin/map-settings/category/delete/(:num)', 'CategoryController::delete/$1');
$routes->get('admin/map-settings/category/edit/(:num)', 'CategoryController::edit/$1');
$routes->patch('admin/map-settings/category/edit/(:num)', 'CategoryController::editSave/$1');
$routes->get('admin/map-settings/add', 'MapSettingsController::add');
$routes->post('admin/map-settings/add', 'MapSettingsController::save');

// Administrator
$routes->get('/admin/administrator', 'AdministratorController::index');
$routes->get('/admin/administrator/add', 'AdministratorController::add');
$routes->post('/admin/administrator/add', 'AdministratorController::save');
$routes->get('/admin/administrator/edit/(:num)', 'AdministratorController::edit/$1');
$routes->patch('/admin/administrator/edit/(:num)', 'AdministratorController::editSave/$1');
$routes->get('/admin/administrator/delete/(:num)', 'AdministratorController::delete/$1');

$routes->get('/admin/menu-manager', 'MenuManagerController::index');

// Settings
$routes->get('/admin/settings', 'SettingsController::index');
$routes->patch('/admin/settings/edit/(:num)', 'SettingsController::saveEdit/$1');

$routes->get('/admin/popup-manager', 'PopupManagerController::index');
$routes->post('/admin/popup-manager/', 'PopupManagerController::save');
$routes->get('/admin/popup-manager/delete/(:num)', 'PopupManagerController::delete/$1');
$routes->patch('/admin/popup-manager/edit/(:num)', 'PopupManagerController::saveEdit/$1');
$routes->patch('admin/popup-manager/setActive', 'PopupManagerController::setActive');

$routes->get('/admin/guestbooks', 'GuestbooksController::index');
$routes->get('/admin/guestbooks/read/(:num)', 'GuestbooksController::read/$1');
$routes->get('/admin/guestbooks/delete/(:num)', 'GuestbooksController::delete/$1');

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
