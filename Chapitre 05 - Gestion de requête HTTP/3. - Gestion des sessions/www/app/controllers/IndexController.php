<?php

use HelloWorld\Models\Utilisateurs;

class IndexController extends ControllerBase
{
    public function indexAction()
    {       

    }

    public function utilisateurSessionSimpleAction(){

        $oUtilisateur = Utilisateurs::findFirst();
        $this->session->set('utilisateur_id', $oUtilisateur->id);
        $this->session->set('utilisateur_prenom', $oUtilisateur->prenom);
    }

    public function utilisateurSessionVerificationAction(){
        if (true == $this->session->has('utilisateur_id') &&
            true == $this->session->has('utilisateur_prenom')) {

            $this->view->utilisateur_id     = $this->session->get('utilisateur_id');
            $this->view->utilisateur_prenom = $this->session->get('utilisateur_prenom');
            $this->view->donnee_session     = true;
        }
        else{
            $this->view->donnee_session     = false;
        }
    }

    public function suppressionUtilisateurSessionAction(){

        // Vérification de l'existance
        $sCleSession = 'utilisateur_id';
        if (true === $this->session->has($sCleSession)) {
            // Suppression de l'élément en session
            $this->session->remove($sCleSession);

            $this->view->session_supprime = true;
        }
        else{
            $this->view->session_supprime = false;
        }
    }

    public function suppressionCompleteSessionAction(){
        $this->session->destroy();
    }
}

