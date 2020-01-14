<?php

$router = $di->getRouter();

// Define your routes here
$router->add('/photo', [
    'controller' => 'index',
    'action'     => 'photo',
])->setName('photo');

$router->handle($_GET['_url'] ?? '/');
