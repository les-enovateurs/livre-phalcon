<?php
/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

use Phalcon\Events\Manager as EventsManager;

$oGestionnaireEvenements = new EventsManager();

$oGestionnaireEvenements->attach('micro', new RequeteMiddleware());
$app->before(new RequeteMiddleware());

$app->setEventsManager($oGestionnaireEvenements);

/**
 * Add your routes here
 */
$app->get('/', function () {
    echo $this->view->render('index');
});

$app->get('/soldes', function () use($app) {
    echo $this->view->render('soldes');
});

$app->get('/soldes_ferme', function () use($app) {
    echo $this->view->render('soldes_ferme');
});

/**
 * Not found handler
 */
$app->notFound(function () use($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo $app->view->render('404');
});
