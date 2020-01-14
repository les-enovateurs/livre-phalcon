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

$app->get('/reponse/direct/{nom}/{prenom}', function ($sNom, $sPrenom) {
    echo "Bienvenue " . ucfirst($sPrenom) . " " . strtoupper($sNom);
});

$app->get('/reponse/json/{nom}/{prenom}', function ($sNom, $sPrenom) {

    $oReponse = new Phalcon\Http\Response();

    $oReponse->setJsonContent([
        'nom'    => strtoupper($sNom),
        'prenom' => ucfirst($sPrenom)
    ]);

    return $oReponse->send();
});

$app->get('/reponse/fichier', function () {
    $oReponse = new Phalcon\Http\Response();

    $oReponse->setContentType('text/csv');
    $oReponse->setContent(file_get_contents(BASE_PATH.'/public/files/balance.csv'));

    return $oReponse->send();
});

/**
 * Not found handler
 */
$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo $app->view->render('404');
});
