<?php

use Phalcon\Mvc\View;
use HelloWorld\Forms\UtilisateurForm;
use HelloWorld\Models\Utilisateurs;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $oUtilisateurForm = null;

        if (true === $this->request->isPost())
        {
            $oUtilisateurForm = new UtilisateurForm();

            if (true === $oUtilisateurForm->isValid($this->request->getPost())) {
                $oUtilisateur = new Utilisateurs();

                $oUtilisateurForm->bind($this->request->getPost(), $oUtilisateur);

                $oUtilisateur->save();
            }
        }
        else{
            $oUtilisateur = new Utilisateurs();

            $oUtilisateurForm = new UtilisateurForm($oUtilisateur);
        }

        $this->view->utilisateur_form = $oUtilisateurForm;
    }
}

