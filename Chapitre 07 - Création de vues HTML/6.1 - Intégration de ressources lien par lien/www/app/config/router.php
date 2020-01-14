<?php

$router = $di->getRouter();

// Define your routes here

$router->handle($_GET['_url'] ?? '/');
