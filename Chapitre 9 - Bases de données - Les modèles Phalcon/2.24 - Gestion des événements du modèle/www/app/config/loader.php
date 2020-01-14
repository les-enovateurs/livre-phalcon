<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->pluginsDir
    ]
)->register();

$loader->registerNamespaces(
    array(
        'HelloWorld\Models'   => $config->application->modelsDir,
        'HelloWorld\Plugins'  => $config->application->pluginsDir,
    )
);