<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $oContenu = $this->api->get('sante');

        $this->view->etat = $oContenu->etat;
    }

}

