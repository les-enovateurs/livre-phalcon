<?php

class EnseignantController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->utilisateur = $this->session->get('utilisateur');
    }
}

