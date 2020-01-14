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
        $nDebut                   = microtime(true);
        $this->view->utilisateurs = Utilisateurs::find();
        $nFin                     = microtime(true);

        $this->view->temps = $nFin - $nDebut;

        $nDebut                         = microtime(true);
        $this->view->utilisateurs_cache = Utilisateurs::find(
            [
                'cache' => [
                    'key' => 'liste-utilisateurs',
                ],
            ]
        );
        $nFin                           = microtime(true);
        $this->view->temps_cache        = $nFin - $nDebut;

        $nDebut                                  = microtime(true);
        $this->view->utilisateurs_cache_4_heures = Utilisateurs::find(
            [
                'cache' => [
                    'key'      => 'liste-utilisateurs-4-heures',
                    'lifetime' => 14400,
                ],
            ]
        );
        $nFin                                    = microtime(true);
        $this->view->temps_cache_4_heures        = $nFin - $nDebut;

        $nDebut                                = microtime(true);
        $this->view->utilisateurs_cache_simple = Utilisateurs::find(
            [
                'cache' => [
                    'key'     => 'liste-utilisateurs-simple',
                    'service' => 'cache',
                ],
            ]
        );
        $nFin                                  = microtime(true);
        $this->view->temps_cache_simple        = $nFin - $nDebut;
    }
}

