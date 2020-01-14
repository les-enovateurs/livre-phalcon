<?php

use Phalcon\Mvc\View;
use HelloWorld\Models\Utilisateurs;

use Phalcon\Db\Column;

class BddController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function connexionSQLAction()
    {
        $this->view->utilisateurs = Utilisateurs::find();
    }

    public function requeteAvecParametresAction()
    {
        $sPhSql = "SELECT prenom as [Like] FROM HelloWorld\Models\Utilisateurs";

        $aUtilisateursAvecMotReserve = $this->modelsManager->executeQuery($sPhSql);

        $this->view->utilisateurs_avec_mot_reserve = $aUtilisateursAvecMotReserve;

        $sPhSql = "SELECT * FROM HelloWorld\Models\Utilisateurs WHERE prenom like :prenom:";

        $aUtilisateursAvecParametres = $this->modelsManager->executeQuery($sPhSql, [ 'prenom' => '%a%' ]);

        $this->view->utilisateurs_avec_parametres = $aUtilisateursAvecParametres;

        $sPhSql = "SELECT * FROM HelloWorld\Models\Utilisateurs limit :nombre_ligne:";

        $aUtilisateursAvecParametresEtType = $this->modelsManager->executeQuery($sPhSql,
            [
                'nombre_ligne' => 3
            ],
            [
                'nombre_ligne' => Column::BIND_PARAM_INT
            ]
        );

        $this->view->utilisateurs_avec_parametres_et_types = $aUtilisateursAvecParametresEtType;

        $sPhSql = "SELECT * FROM HelloWorld\Models\Utilisateurs where id > {id:int}";

        $aUtilisateursAvecParametresEtTypeEcrit = $this->modelsManager->executeQuery($sPhSql,
            [
                'id' => 3
            ]
        );

        $this->view->utilisateurs_avec_parametres_et_types_ecrit = $aUtilisateursAvecParametresEtTypeEcrit;

        /**
         * https://docs.phalconphp.com/3.4/en/db-layer#typed-placeholders
         *
        str 	Column::BIND_PARAM_STR 	{name:str}
        int 	Column::BIND_PARAM_INT 	{number:int}
        double 	Column::BIND_PARAM_DECIMAL 	{price:double}
        bool 	Column::BIND_PARAM_BOOL 	{enabled:bool}
        blob 	Column::BIND_PARAM_BLOB 	{image:blob}
        null 	Column::BIND_PARAM_NULL 	{exists:null}
        array 	Array of Column::BIND_PARAM_STR 	{codes:array}
        array-str 	Array of Column::BIND_PARAM_STR 	{names:array-str}
        array-int 	Array of Column::BIND_PARAM_INT 	{flags:array-int}
         */

        $sPhSql = "SELECT * FROM HelloWorld\Models\Utilisateurs where id > {id:int} AND prenom in ({liste_prenom:array-str})";

        $aUtilisateursAvecParametresEtTypeTableau = $this->modelsManager->executeQuery($sPhSql,
            [
                'id'           => 3,
                'liste_prenom' =>
                    [
                        'Louise', 'Damien', 'Sébastien'
                    ]
            ]
        );

        $this->view->utilisateurs_avec_parametres_et_types_tableau = $aUtilisateursAvecParametresEtTypeTableau;

    }
}

