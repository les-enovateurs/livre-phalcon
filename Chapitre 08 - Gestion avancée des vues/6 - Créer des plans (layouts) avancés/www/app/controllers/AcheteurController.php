<?php

class AcheteurController extends ControllerBase
{
    public function listeBiensAction(){
        $this->view->setMainView('acheteur/liste_biens');
    }
}