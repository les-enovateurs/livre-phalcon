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

$router->add('/fonction/verification/avance', [
    'controller' => 'index',
    'action'     => 'fonctionVerificationAvance',
])->setName('fonction_verification_avance');

$router->add('/heritage/role', [
    'controller' => 'index',
    'action'     => 'heritageRole',
])->setName('heritage_role');

$router->handle($_GET['_url'] ?? '/');
