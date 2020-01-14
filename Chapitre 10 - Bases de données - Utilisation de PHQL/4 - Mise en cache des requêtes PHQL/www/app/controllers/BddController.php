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

    public function cacheSQLAction()
    {
        $nDebut   = microtime(true);
        $oRequete = $this->modelsManager->createQuery('SELECT * FROM HelloWorld\Models\Utilisateurs');
        $oRequete->cache(
            [
                'key'      => 'utilisateurs_phsql',
                'lifetime' => 14400,
            ]
        );

        $this->view->utilisateurs_phql = $oRequete->execute();
        $nFin                          = microtime(true);
        $this->view->temps_cache_phql  = $nFin - $nDebut;

        $nDebut   = microtime(true);
        $oRequete = $this->modelsManager->createQuery('SELECT * FROM HelloWorld\Models\Utilisateurs WHERE prenom LIKE :prenom:');
        $oRequete->cache(
            [
                'key'      => 'utilisateur_condition_phsql',
                'lifetime' => 14400,
            ]
        );

        $this->view->utilisateur_phql_avec_condition = $oRequete->execute([
            'prenom' => 'Jérémy'
        ]);
        $nFin                                         = microtime(true);
        $this->view->temps_cache_phql_avec_condition  = $nFin - $nDebut;

        $oUtilisateur = Utilisateurs::findFirst();
        $this->view->utilisateur_supprime = $oUtilisateur;
        $oUtilisateur->delete();
    }
}

