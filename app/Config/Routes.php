<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index');
$routes->post('/login', 'LoginController::login');
$routes->get('/logout', 'LoginController::logout');
$routes->match(['get','post'],'/register', 'LoginController::register');
$routes->get('/home', 'HomeController::index', ['filter' => 'auth']);