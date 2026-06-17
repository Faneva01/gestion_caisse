<?php
    use CodeIgniter\Router\RouteCollection;

    $routes->get('/', 'UserController::index');
    $routes->post('/login', 'UserController::login');
    $routes->get('/logout', 'UserController::logout');