<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Savings::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->post('savings/add', 'Savings::add');
$routes->get('savings/analytics', 'Savings::analytics');
$routes->get('analytics/pdf', 'Savings::exportPdf');


$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attemptLogin');

$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::attemptRegister');

$routes->get('logout', 'AuthController::logout');







