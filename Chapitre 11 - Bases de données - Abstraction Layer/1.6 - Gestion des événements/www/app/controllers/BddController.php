<?php

use Phalcon\Mvc\View;
use HelloWorld\Models\Utilisateurs;

use Phalcon\Db;

class BddController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function connexionSQLAction(){
        $sSqlSelect                     = 'SELECT * FROM utilisateurs ORDER BY id DESC';
        $this->view->utilisateurs = $this->db->fetchAll($sSqlSelect, Db::FETCH_OBJ);

        $oUtilisateur = new Utilisateurs();
        $oUtilisateur->email = 'nouveau@test.com';
        $oUtilisateur->mot_de_passe = 'azerty';
        $oUtilisateur->save();
        /** Voir phalcon.log */
    }
}

