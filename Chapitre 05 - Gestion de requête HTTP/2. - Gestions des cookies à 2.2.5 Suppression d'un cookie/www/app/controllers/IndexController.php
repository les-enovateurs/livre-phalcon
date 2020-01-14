<?php

class IndexController extends ControllerBase
{
    public function indexAction(){

        $this->view->nom_utilisateur = $this->cookies->get('nom_utilisateur');
    }

    public function connexionAction()
    {
        $bSecurise = $this->dispatcher->getParam("securise");

        $sNomDuCookie = 'nom_utilisateur';

        // Vérifie si l'utilisateur est déjà connecté
        if (true == $this->cookies->has($sNomDuCookie)) {

            // Récupération du cookie nom d'utilisateur
            $oNomUtilisateur = $this->cookies->get($sNomDuCookie);

            // Récupération de valeur contenu dans ce cookie afin de l'afficher dans la vue
            $this->view->cookie_nom_utilisateur = $oNomUtilisateur->getValue();
        }
        else{

            // Création d'un cookie dont le nom est nom_utilisateur, sa valeur Franck.
            // Le cookie sera expiré au bout de 3 jours (86400 secondes)
            $this->cookies->set(
                $sNomDuCookie,
                'Franck',
                time() + 86400
            );

            // Le cookie est envoyé au navigateur du visiteur pour être stocké sur la machine de l'utilisateur
            $this->cookies->send();

            // Récupération de la nouvelle valeur pour l'afficher dans la vue
            // Il faut rafraichir pour se retrouver dans le premier If.
            $oNomUtilisateur = $this->cookies->get($sNomDuCookie);
            $this->view->cookie_nom_utilisateur = $oNomUtilisateur->getValue();
        }
    }

    public function deconnexionAction()
    {
        // Récupération du cookie à supprimer
        $oNomUtilisateur = $this->cookies->get('nom_utilisateur');

        // Suppression du cookie
        $oNomUtilisateur->delete();
    }
}

