<?php
/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new \Phalcon\Config([
    'database' => [
        'adapter'     => 'Postgresql',
        'host'        => 'phalcon-db',
        'username'    => 'postgres',
        'password'    => 'root',
        'dbname'      => 'phalcon',
        'port'        => '5432'
    ],
    'application' => [
        'modelsDir'      => APP_PATH . '/models/',
        'middlewaresDir' => APP_PATH . '/middlewares/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'viewsDir'       => APP_PATH . '/views/',
        'baseUri'        => '/',
    ]
]);
