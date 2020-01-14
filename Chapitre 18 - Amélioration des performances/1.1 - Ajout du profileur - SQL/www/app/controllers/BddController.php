<?php

use Phalcon\Mvc\View;
use HelloWorld\Models\Utilisateurs;

class BddController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function connexionSQLAction(){
        $this->logger->warning("Requête Pure");
        $sSqlSelect                     = 'SELECT id, nom, prenom, email, mot_de_passe FROM utilisateurs';
        $this->view->utilisateurs       = $this->db->fetchAll($sSqlSelect, PDO::FETCH_OBJ);

        $this->logger->warning("Requête avec le modèle");
        $oUtilisateur = Utilisateurs::find();

        $this->logger->warning("Requête avec PhSql");
        $sSqlSelect                     = 'SELECT id, nom, prenom, email, mot_de_passe FROM HelloWorld\Models\Utilisateurs';
        $this->modelsManager->executeQuery($sSqlSelect);

        //Voir phalcon.log
    }
}

