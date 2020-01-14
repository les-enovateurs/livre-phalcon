<?php

$router = $di->getRouter();

// Define your routes here
$router->add('/dossier/utilisateur/{id}', [
    'controller' => 'index',
    'action'     => 'utilisateur',
])->setName('dossier_utilisateur');

$router->handle($_GET['_url'] ?? '/');
