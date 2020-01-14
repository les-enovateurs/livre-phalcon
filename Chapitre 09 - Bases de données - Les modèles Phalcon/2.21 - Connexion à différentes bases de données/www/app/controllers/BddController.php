<?php

use Phalcon\Mvc\View;
use HelloWorld\Models\Utilisateurs;
use HelloWorld\Models\Ville;

class BddController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function multiconnexionSQLAction()
    {
        $this->view->utilisateurs = Utilisateurs::find();
        
        $oUtilisateur               = new Utilisateurs();
        $oUtilisateur->email        = 'axelle.doe@les-enovateurs.com';
        $oUtilisateur->mot_de_passe = 'azerty';
        $oUtilisateur->fonction     = 'CTO';
        $oUtilisateur->save();

        
        $oVille        = new Ville();
        $oVille->nom   = 'lyon';
        $oVille->save();

        $this->view->villes = Ville::find();
    }
}

