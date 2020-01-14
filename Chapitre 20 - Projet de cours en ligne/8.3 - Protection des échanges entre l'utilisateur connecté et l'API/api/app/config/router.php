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

$router->addGet('/api/utilisateur/cours', [
    'controller' => 'utilisateurs',
    'action'     => 'cours',
])->setName('cours_utilisateur');

$router->handle($_GET['_url'] ?? '/');
