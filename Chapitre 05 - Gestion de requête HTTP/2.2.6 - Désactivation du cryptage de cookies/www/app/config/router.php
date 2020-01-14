<?php

$router = $di->getRouter();

// Define your routes here
$router->add('/connexion', [
    'controller' => 'index',
    'action'     => 'connexion',
])->setName('connexion');

$router->add('/deconnexion', [
    'controller' => 'index',
    'action'     => 'deconnexion',
])->setName('deconnexion');

$router->handle($_GET['_url'] ?? '/');
