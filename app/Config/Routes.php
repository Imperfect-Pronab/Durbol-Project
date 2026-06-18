<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Login::login');
$routes->get('/clearCatche', 'Login::clearCatche');
$routes->post('/processLogin', 'Login::processLogin');
