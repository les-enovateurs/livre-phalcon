<?php

use Phalcon\Http\Response;

use HelloWorld\Models\Utilisateurs;

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function page404Action(){
        // Création d'une réponse
        $oResponse = new Response();

        // Modification du code HTTP de la réponse
        $oResponse->setStatusCode(404, 'Page inconnue');

        // Modification du contenu envoyé
        $oResponse->setContent("Désolé la page n'existe pas");

        // Envoi de la réponse
        return $oResponse->send();
    }

    public function contenuJSONAction(){
        // Création d'une réponse
        $oResponse = new Response();

        $aUtilisateurs = Utilisateurs::find();

        // Modification du contenu envoyé
        $oResponse->setJsonContent($aUtilisateurs);

        // Envoi de la réponse
        return $oResponse->send();
    }

    public function contenuFichierAction(){
        // Création d'une réponse
        $oResponse = new Response();

        // Indication du type de contenu a envoyer
        $oResponse->setContentType('text/plain', 'UTF-8');

        // Modification du contenu envoyé
        $oResponse->setContent('un fichier de type texte écrit en UTF-8');

        // Envoi de la réponse
        return $oResponse->send();
    }

    public function modificationEnteteAction(){
        // Création d'une réponse
        $oResponse = new Response();

        // Modification clé/valeur de l'entête
        $oResponse->setHeader('Content-Type', 'text/plain');
        $oResponse->setHeader('Content-Disposition', 'attachment; filename=texte.txt');

        // Modification du contenu envoyé
        $oResponse->setContent('un fichier de type texte écrit en UTF-8');

        // Modification brute de l'entête
        $oResponse->setRawHeader('HTTP/1.1 200 OK');

        // Envoi de la réponse
        return $oResponse->send();
    }

    public function requeteCacheIdentifiantAction(){
        // Création d'une réponse
        $oResponse = new Response();

        $aUtilisateurs = Utilisateurs::find();
        //$aUtilisateurs = [];

        // Modification du contenu envoyé
        $oResponse->setJsonContent($aUtilisateurs);

        // Génération d'une clé unique liée à la donnée envoyée en réponse
        $sTag = md5(json_encode($aUtilisateurs));

        // Enregistrement de la clé dans l'entête de la requête
        $oResponse->setHeader('E-Tag', $sTag);

        // Envoi de la réponse
        return $oResponse->send();
    }

    public function requeteCacheTempsExpirationAction(){
        // Création d'une réponse
        $oResponse = new Response();

        $aUtilisateurs = Utilisateurs::find();

        // Modification du contenu envoyé
        $oResponse->setJsonContent($aUtilisateurs);

        // La requête est conservé en cache pendant 172800 secondes soit 2 jours
        $oResponse->setHeader('Cache-Control', 'max-age=172800');

        // Envoi de la réponse
        return $oResponse->send();
    }

    public function requeteCacheDateExpirationAction(){
        // Création d'une réponse
        $oResponse = new Response();

        $aUtilisateurs = Utilisateurs::find();

        // Modification du contenu envoyé
        $oResponse->setJsonContent($aUtilisateurs);

        // Création d'une variable de date
        $oDateExpiration = new DateTime();

        // Ajout sur cette date d'un mois
        $oDateExpiration->modify('+1 months');
        
        //Ajout de la date d'expiration
        $oResponse->setExpires($oDateExpiration);

        // Envoi de la réponse
        return $oResponse->send();
    }

    public function requeteCacheDatePreciseExpirationAction(){
        // Création d'une réponse
        $oResponse = new Response();

        $aUtilisateurs = Utilisateurs::find();

        // Modification du contenu envoyé
        $oResponse->setJsonContent($aUtilisateurs);

        // Création d'une variable de date dont la valeur est le 24-12-2030
        $oDateExpiration = new DateTime('2030-12-24');
        
        //Ajout de la date d'expiration du 24-12-2030
        $oResponse->setExpires($oDateExpiration);

        // Envoi de la réponse
        return $oResponse->send();
    }

    public function requeteRedirectionUrlInterneAction(){
        // Création d'une réponse
        $oResponse = new Response();

        return $oResponse->redirect('contenu/json');
    }

    public function requeteRedirectionNomRouteAction(){
        // Création d'une réponse
        $oResponse = new Response();

        return $oResponse->redirect(
            [
                'for'        => 'bonjour_nom',
                'nom'        => 'Jérémy',
            ]
        );
    }

    public function requeteRedirectionUrlExterneAction(){
        // Création d'une réponse
        $oResponse = new Response();


        return $oResponse->redirect('https://les-enovateurs.com/', true);
    }

    public function bonjourNomAction(){
        $this->view->nom = $this->dispatcher->getParam('nom');
    }


}

