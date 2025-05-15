<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('/', 'Home::index');
$routes->get('/', 'BlogController::index');
$routes->get('blog', 'BlogController::index');
$routes->get('blog/(:segment)', 'BlogController::view/$1');
$routes->get('dashboard', 'BlogController::getdashboard');
$routes->post('addblogs', 'BlogController::addblog');
$routes->post('authenticate', 'Home::authenticate');
$routes->get('logout', 'Home::logout');
$routes->get('getbloglist', 'BlogController::getbloglist');
$routes->get('getaddblog', 'BlogController::getaddblog');


$routes->post('updateblog/(:num)', 'BlogController::updateblog/$1');
$routes->post('deleteblog/(:num)', 'BlogController::deleteblog/$1');


$routes->get('login', 'BlogController::login');

