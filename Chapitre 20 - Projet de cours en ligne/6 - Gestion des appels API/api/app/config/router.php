<?php

$router = $di->getRouter();

// Define your routes here
$router->addGet('/api/sante', [
    'controller' => 'index',
    'action'     => 'sante',
])->setName('sante_index');


$router->handle();
