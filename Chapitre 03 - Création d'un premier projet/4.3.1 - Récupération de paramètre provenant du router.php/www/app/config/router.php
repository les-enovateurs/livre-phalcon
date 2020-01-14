<?php

$router = $di->getRouter();

// Define your routes here
$router->add(
    '/utilisateur/liste/{entreprise_id}/{cree_le}',
    [
        'controller' => 'utilisateur',
        'action'     => 'liste',
    ]
);


$router->handle($_GET['_url'] ?? '/');
