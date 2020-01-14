<?php

$router = $di->getRouter(false);

// Define your routes here
$router->add(
    '/utilisateur/liste/{entreprise_id}/{cree_le}',
    [
        'controller' => 'utilisateur',
        'action'     => 'liste',
    ]
);

$router->add(
    '/utilisateur/edition/{utilisateur_id:[0-9]+}/{pays:[a-zA-Z]*}',
    [
        'controller' => 'utilisateur',
        'action'     => 'ajaxEdition',
    ]
);

$router->handle();
