<?php

class UtilisateurController extends ControllerBase
{

    public function editionAction()
    {
        $nId = $this->dispatcher->getParam('id');

        $this->view->id = $nId;

    }

}

