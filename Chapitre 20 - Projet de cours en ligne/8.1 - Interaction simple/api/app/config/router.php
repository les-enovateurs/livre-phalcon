<?php

$router = $di->getRouter();

// Define your routes here
$router->addGet('/api/sante', [
    'controller' => 'index',
    'action'     => 'sante',
])->setName('sante_index');

$router->addPost('/api/connexion', [
    'controller' => 'index',
    'action'     => 'connexion',
])->setName('connexion_index');

$router->handle($_GET['_url'] ?? '/');
