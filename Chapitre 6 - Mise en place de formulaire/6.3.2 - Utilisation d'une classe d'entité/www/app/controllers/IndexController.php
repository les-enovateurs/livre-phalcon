<?php

use Phalcon\Mvc\View;
use HelloWorld\Forms\UtilisateurForm;
use HelloWorld\Models\ValeurDefaut;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $oValeur = new ValeurDefaut();

        $oForm = new UtilisateurForm($oValeur);

        $this->view->form = $oForm;
    }
}

