<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/achat', 'AchatController::index');
$routes->post('/achat/ajouter', 'AchatController::ajouterProduit');
$routes->get('/achat/supprimer/(:num)', 'AchatController::supprimerProduit/$1');
$routes->get('/achat/cloturer', 'AchatController::cloturer');