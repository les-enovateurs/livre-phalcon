<?php

$router = $di->getRouter();

// Define your routes here
$router->addGet('/api/utilisateur/{id:[0-9]+}', [
    'controller' => 'utilisateurs',
    'action'     => 'infoUtilisateur',
])->setName('info_utilisateur');

$router->addPost('/api/utilisateur', [
    'controller' => 'utilisateurs',
    'action'     => 'nouvel',
])->setName('nouveau');

$router->handle();
