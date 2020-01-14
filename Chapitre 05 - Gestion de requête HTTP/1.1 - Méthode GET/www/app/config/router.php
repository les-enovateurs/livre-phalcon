<?php

$router = $di->getRouter();

// Define your routes here
$router->add('/recherche/{param1}/{param2}', [
    'controller' => 'index',
    'action'     => 'recherche',
])->setName('recherche_avec_param');

$router->add('/utilisateur/edition/{id:[0-9]+}', [
    'controller' => 'utilisateur',
    'action'     => 'edition',
])->setName('utilisateur_edition');


$router->handle($_GET['_url'] ?? '/');
