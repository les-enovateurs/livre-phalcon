<?php

class IndexController extends ControllerBase
{

    public function santeAction()
    {
        $oContenu = $this->api->get('sante');

        $this->view->etat = $oContenu->etat;
    }

    public function indexAction()
    {
        $oContenu = $this->api->post('connexion', [
            'email'        => 'sandrine.doe@les-enovateurs.com',
            'mot_de_passe' => 'cvbn'
        ]);

        $this->view->utilisateur = $oContenu->utilisateur;
    }

}

