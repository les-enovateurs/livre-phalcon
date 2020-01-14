<?php

/**
 * Registering an autoloader
 */
$loader = new \Phalcon\Loader();

$loader->registerDirs(
    [
        $config->application->modelsDir,
        $config->application->middlewaresDir
    ]
)->register();


$loader->registerNamespaces(
    [
        'HelloWorld\Models' => $config->application->modelsDir,
    ]
);