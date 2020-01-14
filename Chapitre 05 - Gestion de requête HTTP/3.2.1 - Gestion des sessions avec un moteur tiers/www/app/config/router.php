<?php

$router = $di->getRouter();

// Define your routes here
$router->add(
    '/utilisateur',
    [
        'controller' => 'index',
        'action'     => 'utilisateur',
    ]
);

$router->handle();
