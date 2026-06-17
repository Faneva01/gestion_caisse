<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/produits','Produit::index');
$routes->get('/produit/(:num)', 'Produit::show/$1');


$routes_directory = APPPATH . 'Config/Routes';

if (is_dir($routes_directory)) {
    $route_files = glob($routes_directory . '/*.php');

    if ($route_files !== false) {
        foreach ($route_files as $route_file) {
            require $route_file;
        }
    }
}