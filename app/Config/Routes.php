<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'BlogController::getdashboard');
$routes->post('addblog', 'BlogController::addblog');
$routes->get('getaddblog', 'BlogController::getaddblog');