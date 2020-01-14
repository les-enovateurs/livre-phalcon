<?php

$router = $di->getRouter();

// Define your routes here
$router->add('/inscription', [
    'controller' => 'index',
    'action'     => 'inscription',
])->setName('inscription');

$router->handle($_GET['_url'] ?? '/');
