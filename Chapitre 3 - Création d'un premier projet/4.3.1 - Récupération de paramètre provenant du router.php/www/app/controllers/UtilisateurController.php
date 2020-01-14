<?php

class UtilisateurController extends ControllerBase
{
    public function listeAction()
    {
        $nEntrepriseID = $this->dispatcher->getParam('entreprise_id');
        $sCreeLe       = $this->dispatcher->getParam('cree_le');

        $this->view->entreprise_id = $nEntrepriseID;
        $this->view->cree_le = $sCreeLe;
    }
}
