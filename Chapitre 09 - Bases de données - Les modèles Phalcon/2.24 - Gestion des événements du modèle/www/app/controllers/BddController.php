<?php

use Phalcon\Mvc\View;
use HelloWorld\Models\Utilisateurs;

use Phalcon\Db;

class BddController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function utilisationLogModeleAction()
    {

        $this->logger->warning("Ajout (save) d'un utilisateur");
        //Ajout nouveau utilisateur
        $oNouveauUtilisateur               = new Utilisateurs();
        $oNouveauUtilisateur->email        = 'nouveau_' . uniqid() . '@test.com';
        $oNouveauUtilisateur->mot_de_passe = 'azerty';
        $oNouveauUtilisateur->save();

        $this->logger->warning("Récupération du premier utilisateur");
        $oPremierUtilisateur      = Utilisateurs::findFirst();
        $oPremierUtilisateur->nom = 'PAUL';

        $this->logger->warning("Modification (save) d'une ligne");

        $oPremierUtilisateur->save();

        $oPremierUtilisateur->nom = 'PAUL2';

        $this->logger->warning("Modification d'une ligne");

        $oPremierUtilisateur->update();

        $oNouveau2Utilisateur        = new Utilisateurs();
        $oNouveau2Utilisateur->email = 'nouveau2_' . uniqid() . '@test.com';

        $this->logger->warning("Création d'un nouvel utilisateur");

        $oNouveau2Utilisateur->create();

        $this->logger->warning("Suppression d'un utilisateur");

        $oPremierUtilisateur->delete();
        /** Voir phalcon.log */
    }
}

