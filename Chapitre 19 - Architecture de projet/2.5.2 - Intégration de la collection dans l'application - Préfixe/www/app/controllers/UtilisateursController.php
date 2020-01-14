<?php

use Phalcon\Mvc\Controller;

class UtilisateursController extends Controller
{
    public function bonjour($sNom)
    {
        echo $this->view->render('utilisateurs/bonjour', [
            'nom' => $sNom
        ]);
    }
}