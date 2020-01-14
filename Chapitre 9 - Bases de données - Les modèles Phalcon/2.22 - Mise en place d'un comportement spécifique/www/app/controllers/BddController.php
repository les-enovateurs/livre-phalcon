<?php

use Phalcon\Mvc\View;
use HelloWorld\Models\Utilisateurs;


use Phalcon\Mvc\Model\Resultset;

class BddController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function connexionSQLAction()
    {
        $this->view->utilisateurs = Utilisateurs::find();
    }

    public function comportementAction()
    {
        $this->view->utilisateurs = Utilisateurs::find([
            'hydration' => Resultset::HYDRATE_ARRAYS,
        ]);

        $oUtilisateur               = new Utilisateurs();
        $oUtilisateur->prenom       = 'Loic';
        $oUtilisateur->nom          = 'DOE';
        $oUtilisateur->email        = 'loic.doe@graphivox.com';
        $oUtilisateur->mot_de_passe = 'azerty';
        $oUtilisateur->save();

        $this->view->utilisateurs_ajoutes = Utilisateurs::find([
            'hydration' => Resultset::HYDRATE_ARRAYS,
        ]);

        $oPremierUtilisateur = Utilisateurs::findFirst();

        $oPremierUtilisateur->nom = 'JOHN';
        $oPremierUtilisateur->save();

        $this->view->utilisateurs_modifies = Utilisateurs::find([
            'hydration' => Resultset::HYDRATE_ARRAYS,
        ]);

        $oPremierUtilisateur->delete();
        $this->view->utilisateurs_supprimes = Utilisateurs::find([
            'hydration' => Resultset::HYDRATE_ARRAYS,
        ]);
    }
}

