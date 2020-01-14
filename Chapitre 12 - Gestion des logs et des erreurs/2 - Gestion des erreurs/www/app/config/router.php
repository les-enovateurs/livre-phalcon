<?php

$router = $di->getRouter();

$router->add('/erreur/importante', [
    'controller' => 'index',
    'action'     => 'erreurImportante',
])->setName('erreur_importante');

$router->handle();
