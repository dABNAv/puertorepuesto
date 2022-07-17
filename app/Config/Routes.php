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

// sesion usuario 'filter' => 'auth:admin'
$routes->group('', ['namespace' => 'App\Controllers\Front'], function($routes)
{
    $routes->get('/', 'HomeController::index', ['as' => 'homePage']);
    $routes->get('producto', 'HomeController::view_product', ['as' => 'productPage']);
    
});

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function($routes)
{
    $routes->get('/', 'HomeController::index', ['as' => 'homeAdmin']);
    $routes->get('usuarios', 'UsersController::index', ['as' => 'usersList']);
    $routes->get('productos', 'ProductsController::index', ['as' => 'productsList']);

    $routes->get('categorias', 'CategoriesController::index', ['as' => 'categoriesList']);
    $routes->get('categorias/nueva', 'CategoriesController::create', ['as' => 'categoriesCreate']);
    $routes->post('save', 'CategoriesController::save', ['as' => 'categoriesSave']);
    $routes->get('editar/(:num)', 'CategoriesController::edit/$1');
    $routes->get('eliminar/(:num)', 'CategoriesController::delete/$1');
    $routes->post('update', 'CategoriesController::update', ['as' => 'categoriesUpdate']);


});

$routes->group('auth', ['namespace' => 'App\Controllers\Auth'], function($routes)
{
    $routes->get('login', 'LoginController::index', ['as' => 'login']);
    $routes->post('signin', 'LoginController::login', ['as' => 'signin']);
    $routes->get('signout', 'LoginController::signout', ['as' => 'signout']);

    $routes->get('bye', 'LoginController::signout', ['as' => 'homePage']);

    $routes->get('registro', 'RegisterController::index', ['as' => 'register']);
    $routes->post('store', 'RegisterController::store');

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
