<?php
/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

use Phalcon\Mvc\Micro\Collection as MicroCollection;

$oUtilisateurs = new MicroCollection();

$oUtilisateurs->setHandler(new UtilisateursController());

// Mise en place d'un préfixe commun à toutes les pages du contrôleur utilisateurs
$oUtilisateurs->setPrefix('/utilisateurs');

$oUtilisateurs->get('/bonjour/{nom}', 'bonjour');

$app->mount($oUtilisateurs);

/**
 * Add your routes here
 */
$app->get('/', function () {
    echo $this->view->render('index');
});

/**
 * Not found handler
 */
$app->notFound(function () use($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo $app->view->render('404');
});

