<?php

$router = $di->getRouter();

// Define your routes here
$router->add(
    '/utilisateur/connexion',
    [
        'controller' => 'utilisateur',
        'action'     => 'connexion',
    ]
);

$router->handle('/utilisateur/connexion');

$router->getMatchedRoute();

echo "Contrôleur : ".$router->getControllerName()." Action : ".$router->getActionName();

$router->handle();
