<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Direct as Flash;

use Phalcon\Db;

use Phalcon\Mvc\Dispatcher;
use Phalcon\Db\Profiler as DbProfiler;
use Phalcon\Events\Event;

/**
 * Shared configuration service
 */
$di->setShared('config', function () {
    return include APP_PATH . "/config/config.php";
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
 * Setting up the view component
 */
$di->setShared('view', function () {
    $config = $this->getConfig();

    $view = new View();
    $view->setDI($this);
    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines([
        '.volt' => function ($view) {
            $config = $this->getConfig();

            $volt = new VoltEngine($view, $this);

            $volt->setOptions([
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ]);

            return $volt;
        },
        '.phtml' => PhpEngine::class

    ]);

    return $view;
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
        'dbname'   => $config->database->dbname,
        'options'  => [
            PDO::ATTR_DEFAULT_FETCH_MODE => Db::FETCH_ASSOC
        ]
        /** $$ 'charset'  => $config->database->charset*/
    ];

    $connection = new $class($params);

    $oGestionEvenement = new Phalcon\Events\Manager();
    $oProfiler         = new DbProfiler();
    $oLogger           = $this->getLogger();

    $oGestionEvenement->attach(
        'db',
        function (Event $oEvent, $oConnexion) use ($oProfiler, $oLogger) {
            if ($oEvent->getType() === 'beforeQuery') {
                $sSql = $oConnexion->getSQLStatement();

                $oProfiler->startProfile($sSql);
            }

            if ($oEvent->getType() === 'afterQuery') {
                $oProfiler->stopProfile();

                $oResultat = $oProfiler->getLastProfile();

                $oLogger->debug('La requête SQL: '. $oResultat->getSQLStatement());
                $oLogger->debug('Heure de début: '. $oResultat->getInitialTime());
                $oLogger->debug('Heure de fin: '. $oResultat->getFinalTime());
                $oLogger->debug('Temps total: '. $oResultat->getTotalElapsedSeconds());
            }            
        }
    );

    $connection->setEventsManager($oGestionEvenement);

    return $connection;
});


/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
$di->set('flash', function () {
    return new Flash([
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
});

/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

$di->setShared('logger', function () {
    $oLogger = new \Phalcon\Logger\Adapter\File(BASE_PATH.'/phalcon.log');

    return $oLogger;
});

