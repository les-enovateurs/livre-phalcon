<?php

use NovaMooc\Library\ClientApi;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $oClient = new ClientApi('http://mooc-api/api/');

        $oContenu = $oClient->get('sante');

        $this->view->etat = $oContenu->etat;
    }

}

