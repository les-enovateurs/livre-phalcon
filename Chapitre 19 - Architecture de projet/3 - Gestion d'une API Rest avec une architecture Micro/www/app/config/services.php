<?php

use Phalcon\Mvc\View\Simple as View;
use Phalcon\Url as UrlResolver;

/**
 * Shared configuration service
 */
$di->setShared('config', function () {
    return include APP_PATH . "/config/config.php";
});

/**
 * Sets the view component
 */
$di->setShared('view', function () {
    $config = $this->getConfig();

    $view = new View();
    $view->setViewsDir($config->application->viewsDir);
    return $view;
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->setShared('url', function () {
    $config = $this->getConfig();

    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);
    return $url;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () {
    $config = $this->getConfig();

    $class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    $params = [
        'host'     => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname'   => $config->database->dbname
        /** $$ 'charset'  => $config->database->charset*/
    ];

    $connection = new $class($params);

    return $connection;
});

$di->setShared('logger', function () {
    $oAdapter = new Phalcon\Logger\Adapter\Stream(BASE_PATH.'/phalcon.log');
    $oLogger  = new Phalcon\Logger(
        'messages',
        [
            'main' => $oAdapter,
        ]
    );

    $oLogger->setLogLevel(Phalcon\Logger::ERROR);

    return $oLogger;
});