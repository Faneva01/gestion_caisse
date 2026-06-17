<?php
    use CodeIgniter\Router\RouteCollection;

    $routes->get('/choix_caisse', 'CaisseController::index');
    $routes->post('/caisse/choisir', 'CaisseController::choisir');