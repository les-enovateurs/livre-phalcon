<?php

class EnseignantController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->utilisateur = $this->session->get('utilisateur');
        $this->view->cours       = $this->api->get('utilisateur/cours');
    }
}

