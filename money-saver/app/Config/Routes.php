<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('', ['filter' => 'auth'], function($routes) {

$routes->get('/', 'Savings::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->post('savings/add', 'Savings::add');
$routes->get('savings/analytics', 'Savings::analytics');
$routes->get('analytics/pdf', 'Savings::exportPdf');
});

$routes->post('login', 'AuthController::attemptLogin');
$routes->post('register', 'AuthController::attemptRegister');

$routes->group('', ['filter' => 'guest'], function($routes) {
    $routes->get('/login', 'AuthController::login');
    $routes->get('/register', 'AuthController::register');
});


$routes->get('logout', 'AuthController::logout');







