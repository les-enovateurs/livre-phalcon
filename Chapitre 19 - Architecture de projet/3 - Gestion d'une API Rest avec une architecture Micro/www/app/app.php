<?php
/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

use Phalcon\Events\Manager as EventsManager;
use Phalcon\Http\Response;

use HelloWorld\Models\Utilisateurs;

/** Gestion évévenement */
$oGestionnaireEvenements = new EventsManager();

$oGestionnaireEvenements->attach('micro', new SecurityMiddleware());
$app->before(new SecurityMiddleware());

$oGestionnaireEvenements->attach('micro', new ReponseMiddleware());
$app->after(new ReponseMiddleware());

$app->setEventsManager($oGestionnaireEvenements);
/**
 * Add your routes here
 */
$app->get('/', function () use ($app) {
    $app->response->redirect('/api_doc/index.html');
    $app->response->send();
});

/**
 * @api {get} /api/utilisateurs Récupération des utilisateurs
 * @apiName RecupereUtilisateurs
 * @apiGroup Utilisateurs
 *
 * @apiExample {curl} Exemple d'utilisation:
 *     curl -i -X GET http://127.0.0.1/api/utilisateurs
 *
 * @apiSuccess {Array} payload Liste d'utilisateurs
 *
 * @apiVersion 0.0.1
 * @apiSampleRequest http://127.0.0.1/api/utilisateurs
 */
$app->get('/api/utilisateurs', function () {
    return Utilisateurs::find();
});

/**
 * @api {get} /api/utilisateurs/:id Récupération d'un utilisateur
 * @apiParam {Integer} id L'ID de l'utilisateur a récupéré.
 * @apiName RecupereUtilisateur
 * @apiGroup Utilisateurs
 * @apiExample {curl} Exemple d'utilisation:
 *     curl -i -X GET http://127.0.0.1/api/utilisateur/3
 *
 * @apiSuccess {Object} payload Contient les informations d'un utilisateur
 *
 * @apiVersion 0.0.1
 * @apiSampleRequest http://127.0.0.1/api/utilisateur/:id
 */
$app->get('/api/utilisateur/{id:[0-9]+}', function ($nId) {
    return Utilisateurs::findById($nId);
});

/**
 * @api {post} /api/utilisateur Création d'un nouvel utilisateur
 * @apiName NouvelUtilisateur
 * @apiGroup Utilisateurs
 * @apiExample {curl} Exemple d'utilisation:
 *     curl -i -X POST -d '{"nom":"DOE","prenom":"Conor","email":"conor.doe@les-enovateurs.com", "mot_de_passe":"azert"}' http://127.0.0.1/api/utilisateur
 *
 * @apiSuccess {Object} payload Renvoie le nouvel utilisateur crée
 *
 * @apiVersion 0.0.1
 */
$app->post('/api/utilisateur', function () use ($app) {
    $aUtilisateur = $app->request->getJsonRawBody(true);

    $oUtilisateur = new Utilisateurs();
    $bSauvegarde  = $oUtilisateur->save($aUtilisateur);

    if (true == $bSauvegarde) {
        return $oUtilisateur;
    } else {
        throw new \Exception('Utilisateur déjà existant', 500);
    }
});

/**
 * @api {put} /api/utilisateur/:id Modification d'un utilisateur
 * @apiParam {Integer} id L'ID de l'utilisateur a modifié.
 * @apiName ModifieUtilisateur
 * @apiGroup Utilisateurs
 *
 * @apiExample {curl} Exemple d'utilisation:
 *     curl -i -X PUT -d '{"nom":"DOE","prenom":"Pauline","email":"pauline.doe@les-enovateurs.com"}' http://127.0.0.1/api/utilisateur/3
 *
 * @apiSuccess {Object} payload Contient les informations de l'utilisateur modifié
 *
 * @apiVersion 0.0.1
 */
$app->put('/api/utilisateur/{id:[0-9]+}', function ($nId) use ($app) {
    $oUtilisateurSource = $app->request->getJsonRawBody();

    $oUtilisateur = Utilisateurs::findFirstById($nId);
    if ($oUtilisateur instanceof Utilisateurs) {
        $oUtilisateur->nom    = $oUtilisateurSource->nom;
        $oUtilisateur->prenom = $oUtilisateurSource->prenom;
        $oUtilisateur->email  = $oUtilisateurSource->email;

        $bModification = $oUtilisateur->save();

        if (true == $bModification) {
            return $oUtilisateur;
        } else {
            throw new \Exception('Erreur lors de la modification de l\'utilisateur', 500);
        }
    } else {
        throw new \Exception('L\'utilisateur n\'a pas été trouvé', 404);
    }
});

/**
 * @api {delete} /api/utilisateur/:id Suppression d'un utilisateur
 * @apiParam {Integer} id L'ID de l'utilisateur a supprimé.
 * @apiName SupprimeUtilisateur
 * @apiGroup Utilisateurs
 *
 * @apiExample {curl} Exemple d'utilisation:
 *     curl -i -X DELETE http://127.0.0.1/api/utilisateur/4
 *
 * @apiSuccess {Boolean} payload Contient la valeur true si l'utilisateur a bien été supprimé
 *
 * @apiVersion 0.0.1
 * @apiSampleRequest http://127.0.0.1/api/utilisateur/{id}
 */
$app->delete('/api/utilisateur/{id:[0-9]+}', function ($nId) {
    $oUtilisateur = Utilisateurs::findFirstById($nId);
    if ($oUtilisateur instanceof Utilisateurs) {
        $bSuppression = $oUtilisateur->delete();

        if (true == $bSuppression) {
            return true;
        } else {
            throw new \Exception('Erreur lors de la suppression de l\'utilisateur', 500);
        }
    } else {
        throw new \Exception('L\'utilisateur n\'a pas été trouvé', 404);
    }
});

/** GESTION DES EXCEPTIONS */
$app->error(
    function ($oException) use ($app) {

        $nCode          = 500;
        $sMessageStatus = 'Serveur Erreur';

        if (true === in_array($oException->getCode(), [ 401, 404 ])) {
            $nCode          = $oException->getCode();
            $sMessageStatus = $oException->getMessage();
        }

        $app->response->setJsonContent(
            [
                'code'    => $oException->getCode(),
                'status'  => 'erreur',
                'message' => $oException->getMessage(),
            ]
        );

        $app->response->setStatusCode($nCode, $sMessageStatus);

        return $app->response->send();
    }
);