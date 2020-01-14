<?php

use Phalcon\Mvc\View;
use HelloWorld\Models\Utilisateurs;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        // Ajout d'un nom d'utilisateur
        $this->session->set('nom_utilisateur', 'Jérémy');
    }

    public function utilisateurAction()
    {
        // Vérifie si la propriété nom_utilisateur existe en session
        if (true === $this->session->has('nom_utilisateur')) {
            // Récupération de la donnée en session
            $this->view->nom_utilisateur = $this->session->get('nom_utilisateur');
        }
    }
}