<?php
use CodeIgniter\Router\RouteCollection;

$routes->get('/achat', 'Achat::index');
$routes->post('/achat/ajouter', 'Achat::ajouter');
$routes->post('/achat/cloturer', 'Achat::cloturer');
