<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('/', 'Home::index');
$routes->get('/', 'Blog::index');
$routes->get('blog', 'Blog::index');
$routes->get('blog/(:segment)', 'Blog::view/$1');
$routes->get('blog/ajaxView/(:segment)', 'Blog::ajaxView/$1');
$routes->get('login', 'Blog::login');

$routes->get('dashboard', 'BlogController::getdashboard');
$routes->post('addblogs', 'BlogController::addblog');
$routes->get('getaddblog', 'BlogController::getaddblog');
$routes->post('authenticate', 'Home::authenticate');
$routes->get('logout', 'Home::logout');


// $routes->get('login', 'Blog::login');

// $routes->get('blog/ajaxView/(:segment)', 'Blog::ajaxView/$1');




