<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir
    ]
)->register();

$loader->registerNamespaces(
    array(
        'Chap6\Models'  => $config->application->modelsDir,
        'HelloWorld\Forms'   => $config->application->formsDir
    )
);