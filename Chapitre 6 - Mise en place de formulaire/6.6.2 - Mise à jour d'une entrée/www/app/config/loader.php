<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->formsDir,
        $config->application->modelsDir
    ]
)->register();

$loader->registerNamespaces(
    array(
        'HelloWorld\Forms'  => $config->application->formsDir,
        'HelloWorld\Models'  => $config->application->modelsDir,
    )
);