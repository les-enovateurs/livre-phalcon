<?php
/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

/**
 * Add your routes here
 */
$app->get('/', function () {
    echo $this->view->render('index');
});

$app->get('/bonjour/{nom}', function ($sNom) {
    echo $this->view->render('bonjour', [
        'nom' => $sNom
    ]);
});

$app->get('/article/{site:[a-zA-Z\-\.]+}/{categories:[a-zA-Z\-\.]+}/{mois:[0-9]{2}}/{annee:[0-9]{4}}', function ($sSite, $sCategorie, $sMois, $sAnnee) {
    echo $this->view->render('articles', [
        'site'      => $sSite,
        'categorie' => $sCategorie,
        'mois'      => $sMois,
        'annee'     => $sAnnee
    ]);
});

/**
 * Not found handler
 */
$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo $app->view->render('404');
});
