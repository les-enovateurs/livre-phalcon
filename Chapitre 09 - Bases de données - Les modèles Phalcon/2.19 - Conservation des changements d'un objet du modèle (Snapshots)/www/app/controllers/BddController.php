<?php

use Phalcon\Mvc\View;
use HelloWorld\Models\Utilisateurs;

class BddController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function connexionSQLAction()
    {
        $this->view->utilisateurs = Utilisateurs::find();
    }

    public function snapshotsAction()
    {
        $oPremierUtilisateur                  = Utilisateurs::findFirst();

        $this->view->premier_utilisateur_base = clone $oPremierUtilisateur;

        $oPremierUtilisateur->prenom          = 'Malika';
        $oPremierUtilisateur->email           = 'malika.doe_'.uniqid().'@les-enovateurs.com';

        $this->view->premier_utilisateur_modifie = clone $oPremierUtilisateur;

        $this->view->colonnes_modifiees = $oPremierUtilisateur->getChangedFields();
        $this->view->prenom_modifiees   = $oPremierUtilisateur->hasChanged('prenom');
        $this->view->nom_modifiees      = $oPremierUtilisateur->hasChanged('nom');

        $this->view->colonnes_modifiees_avant_sauvegarde = $oPremierUtilisateur->getUpdatedFields();

        $oPremierUtilisateur->save();

        $this->view->colonnes_modifiees_apres_sauvegarde = $oPremierUtilisateur->getUpdatedFields();
    }
}

