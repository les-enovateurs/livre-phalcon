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

$router->add('/tableauDeBord', [
    'controller' => 'index',
    'action'     => 'tableauDeBord',
])->setName('tableau_de_bord');

$router->handle();
