<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Authentication::login');
$routes->get('Authentication/login', 'Authentication::login');

# Authentication
$routes->post('Authentication/loginProccess', 'Authentication::loginProccess');

# Home
$routes->get('Home/main', 'Home::main');
$routes->post('Home/getContacts', 'Home::getContacts');
$routes->post('Home/getUserChat', 'Home::getUserChat');
$routes->post('Home/sentMessage', 'Home::sentMessage');
$routes->post('Home/getMessagesChat', 'Home::getMessagesChat');
$routes->post('Home/changeStatus', 'Home::changeStatus'); 
