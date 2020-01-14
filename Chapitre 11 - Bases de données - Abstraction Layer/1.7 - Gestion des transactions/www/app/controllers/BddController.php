<?php

use Phalcon\Mvc\View;
use HelloWorld\Models\Utilisateurs;

use Phalcon\Db\Enum;

class BddController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function connexionSQLAction(){
        $this->view->utilisateurs = Utilisateurs::find();
    }

    public function transactionAction(){

        /** AVEC ERREUR */
        $sSql = 'SELECT * FROM utilisateurs ORDER BY id ASC LIMIT 2';
        $this->view->avant_transaction = $this->db->fetchAll($sSql, Enum::FETCH_OBJ);
        try {
            // Démarrage de la transaction
            $this->db->begin();
        
            $this->db->execute('DELETE FROM utilisateurs WHERE id = 1');
            $this->view->apres_suppression = $this->db->fetchAll($sSql, Enum::FETCH_OBJ);

            $this->db->execute("UPDATE utilisateurs set email=null WHERE id = 2");
        
            // Fin de la transaction et application des requêtes
            $this->db->commit();

        } catch (Exception $e) {
            $this->view->erreur1 = $e->getMessage();

            // Retour en arrière dû à une erreur
            $this->db->rollback();

            $this->view->apres_rollback = $this->db->fetchAll($sSql, Enum::FETCH_OBJ);
            
        }

        /** SANS ERREUR */
        $sSql = 'SELECT * FROM utilisateurs ORDER BY id ASC LIMIT 2';
        $this->view->avant_transaction_sans_erreur = $this->db->fetchAll($sSql, Enum::FETCH_OBJ);
        try {
            // Démarrage de la transaction
            $this->db->begin();
        
            $this->db->execute('DELETE FROM utilisateurs WHERE id = 1');
            $this->view->apres_suppression_sans_erreur = $this->db->fetchAll($sSql, Enum::FETCH_OBJ);

            $this->db->execute("UPDATE utilisateurs SET nom='ANCIEN' WHERE id = 2");
        
            $this->view->apres_modification_sans_erreur = $this->db->fetchAll($sSql, Enum::FETCH_OBJ);

            // Fin de la transaction et application des requêtes
            $this->db->commit();

            $this->view->apres_suppression_apres_commit = $this->db->fetchAll($sSql, Enum::FETCH_OBJ);

        } catch (Exception $e) {
            $this->view->erreur = $e->getMessage();

            // Retour en arrière dû à une erreur
            $this->db->rollback();            
        }
    }
}

