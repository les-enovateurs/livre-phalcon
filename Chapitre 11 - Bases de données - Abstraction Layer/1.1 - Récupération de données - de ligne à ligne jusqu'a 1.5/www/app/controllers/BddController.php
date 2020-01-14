<?php

use HelloWorld\Models\Utilisateurs;
use Phalcon\Db\Column;
use Phalcon\Db\Enum;

class BddController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function connexionSQLAction()
    {
        $this->view->utilisateurs = Utilisateurs::find();
    }

    public function requeteSimpleSqlAction()
    {
        $sSql      = 'SELECT id, prenom, nom, email FROM utilisateurs ORDER BY prenom';
        $oResultat = $this->db->query($sSql);

        //Récupération du nombre de ligne retournées
        $this->view->nombre_ligne = $oResultat->numRows();

        //Plus rapide
        $aListePersonnalise = [];
        while ($aElement = $oResultat->fetch()) {
            $aListePersonnalise[] = 'Md5 Prenom : ' . md5($aElement['prenom']) . ' - Nom : ' . strtoupper($aElement['nom']);
        }

        $this->view->liste_personnalise = $aListePersonnalise;

        $this->view->tableau_de_donnee = $this->db->fetchAll($sSql);

        $this->view->une_ligne_de_donnee = $this->db->fetchOne($sSql);

        //Deplacer le curseur
        $oResultat->dataSeek(3);//commence par 0

        $this->view->ligne_3 = $oResultat->fetch();
    }

    public function requeteSimpleModeFetchAction()
    {
        // cphalcon/phalcon/Db/Enum.zep
        //    const FETCH_ASSOC      = \Pdo::FETCH_ASSOC;
        //    const FETCH_BOTH       = \Pdo::FETCH_BOTH;
        //    const FETCH_BOUND      = \Pdo::FETCH_BOUND;
        //    const FETCH_CLASS      = \Pdo::FETCH_CLASS;
        //    const FETCH_CLASSTYPE  = \Pdo::FETCH_CLASSTYPE;
        //    const FETCH_COLUMN     = \Pdo::FETCH_COLUMN;
        //    const FETCH_FUNC       = \Pdo::FETCH_FUNC;
        //    const FETCH_GROUP      = \Pdo::FETCH_GROUP;
        //    const FETCH_INTO       = \Pdo::FETCH_INTO;
        //    const FETCH_KEY_PAIR   = \Pdo::FETCH_KEY_PAIR;
        //    const FETCH_LAZY       = \Pdo::FETCH_LAZY;
        //    const FETCH_NAMED      = \Pdo::FETCH_NAMED;
        //    const FETCH_NUM        = \Pdo::FETCH_NUM;
        //    const FETCH_OBJ        = \Pdo::FETCH_OBJ;
        //    const FETCH_PROPS_LATE = \Pdo::FETCH_PROPS_LATE;
        //    const FETCH_SERIALIZE  = \Pdo::FETCH_SERIALIZE;
        //    const FETCH_UNIQUE     = \Pdo::FETCH_UNIQUE;

        $sSql      = 'SELECT id, prenom, nom, email FROM utilisateurs ORDER BY prenom';
        $oResultat = $this->db->query($sSql);

        $oResultat->setFetchMode(Enum::FETCH_NUM);

        $this->view->recuperation_numero = $oResultat->fetchAll();

        $this->view->recuperation_associative = $this->db->fetchAll($sSql, Enum::FETCH_ASSOC);

        $this->view->recuperation_associative_numero = $this->db->fetchAll($sSql, Enum::FETCH_BOTH);

        $this->view->recuperation_objet = $this->db->fetchAll($sSql, Enum::FETCH_OBJ);
    }

    public function requeteAvecParametreAction()
    {
        $sSql      = 'SELECT id, prenom, nom, email FROM utilisateurs where prenom = ? and id > ? order by prenom';
        $oResultat = $this->db->query($sSql, [
            'Damien',
            2
        ]);

        $this->view->requete_parametre_point_interrogation = $oResultat->fetchAll();

        $sSql = 'SELECT id, prenom, nom, email FROM utilisateurs where prenom = :prenom and id > :id order by prenom';

        $this->view->requete_parametre_par_nom = $this->db->fetchAll($sSql, Enum::FETCH_ASSOC, [
            'prenom' => 'Damien',
            'id'     => 2
        ]);
    }

    public function requetePrepareAction()
    {
        $oRequetePrepare = $this->db->prepare('SELECT id, prenom, nom, email FROM utilisateurs where prenom = :prenom and id > :id order by prenom');

        $aUtilisateursPrepare = $this->db->executePrepared($oRequetePrepare, [
            'prenom' => 'Camille',
            'id'     => 2
        ], null)->fetchAll();

        $this->view->requete_prepare = $aUtilisateursPrepare;

        $oRequetePrepare = $this->db->prepare('SELECT id, prenom, nom, email FROM utilisateurs where prenom = :prenom and id > :id order by prenom');

        $aUtilisateursType = $this->db->executePrepared($oRequetePrepare, [
            'prenom' => 'Camille',
            'id'     => 2
        ],
            [
                'prenom' => Column::BIND_PARAM_STR,
                'id'     => Column::BIND_PARAM_INT
            ])->fetchAll();

        $this->view->requete_prepare_type = $aUtilisateursType;
    }

    public function insertionDeDonneesAction()
    {
        $sSqlInsertion = 'INSERT INTO utilisateurs(nom,prenom,email,mot_de_passe) VALUES (?, ?, ?, ?)';
        $bResultat     = $this->db->execute(
            $sSqlInsertion,
            [
                'DOE',
                'Franck',
                'franck.doe@unlock-my-data.com',
                'FB',
            ]
        );

        if (true === $bResultat) {
            $sSqlSelect                     = 'SELECT * FROM utilisateurs ORDER BY id DESC';
            $this->view->nouvel_utilisateur = $this->db->fetchOne($sSqlSelect, Enum::FETCH_OBJ);
        }

        $sSqlInsertion = 'INSERT INTO utilisateurs(nom,prenom,email,mot_de_passe) VALUES (:nom, :prenom, :email, :mot_de_passe)';
        $bResultat     = $this->db->execute(
            $sSqlInsertion,
            [
                'nom'          => 'DOE',
                'prenom'       => 'Bernadette',
                'email'        => 'bernadette.doe@unlock-my-data.com',
                'mot_de_passe' => 'BD'
            ]
        );

        if (true === $bResultat) {
            $sSqlSelect                                   = 'SELECT * FROM utilisateurs ORDER BY id DESC';
            $this->view->nouvel_utilisateur_nom_parametre = $this->db->fetchOne($sSqlSelect, Enum::FETCH_OBJ);
        }

        $bResultat = $this->db->insert(
            'utilisateurs',
            [
                'Françoise',
                'françoise.doe@unlock-my-data.com',
                'FD'
            ],
            [
                'prenom',
                'email',
                'mot_de_passe',
            ]
        );
        if (true === $bResultat) {
            $sSqlSelect                                       = 'SELECT * FROM utilisateurs ORDER BY id DESC';
            $this->view->nouvel_utilisateur_requete_dynamique = $this->db->fetchOne($sSqlSelect, Enum::FETCH_OBJ);
        }

        $bResultat = $this->db->insertAsDict(
            'utilisateurs',
            [
                'prenom'       => 'Claude',
                'mot_de_passe' => '1324',
                'email'        => 'claude@unlock-my-data.com',
            ]
        );
        if (true === $bResultat) {
            $sSqlSelect                                                   = 'SELECT * FROM utilisateurs ORDER BY id DESC';
            $this->view->nouvel_utilisateur_requete_dynamique_par_tableau = $this->db->fetchOne($sSqlSelect, Enum::FETCH_OBJ);
        }
    }

    public function miseAjourDeDonneesAction()
    {
        $sSqlSelect                        = 'SELECT * FROM utilisateurs WHERE id = :id';
        $this->view->utilisateur_reference = $this->db->fetchOne($sSqlSelect, Enum::FETCH_OBJ, [ 'id' => 1 ]);

        $sSqlMAJ   = 'UPDATE utilisateurs SET prenom = ? WHERE id = ?';
        $bResultat = $this->db->execute(
            $sSqlMAJ,
            [
                'Joe',
                1
            ]
        );

        if (true === $bResultat) {
            $sSqlSelect                  = 'SELECT * FROM utilisateurs WHERE id = :id';
            $this->view->utilisateur_maj = $this->db->fetchOne($sSqlSelect, Enum::FETCH_OBJ, [ 'id' => 1 ]);
        }

        $sSqlMAJ   = 'UPDATE utilisateurs SET prenom = :prenom WHERE id = :id';
        $bResultat = $this->db->execute(
            $sSqlMAJ,
            [
                'prenom' => 'Jean',
                'id'     => 1
            ]
        );

        if (true === $bResultat) {
            $sSqlSelect                                = 'SELECT * FROM utilisateurs WHERE id = :id';
            $this->view->maj_utilisateur_nom_parametre = $this->db->fetchOne($sSqlSelect, Enum::FETCH_OBJ, [ 'id' => 1 ]);
        }

        $bResultat = $this->db->update(
            'utilisateurs',//attention tableau inversé
            [
                'prenom',
            ],
            [
                'Odile'
            ],
            'id = 1'
        );
        
        if (true === $bResultat) {
            $sSqlSelect                         = 'SELECT * FROM utilisateurs WHERE id = :id';
            $this->view->maj_utilisateur_simple = $this->db->fetchOne($sSqlSelect, Enum::FETCH_OBJ, [ 'id' => 1 ]);
        }

        $bResultat = $this->db->update(
            'utilisateurs',//attention tableau inversé
            [
                'prenom',
            ],
            [
                'Floriane'
            ],
            [
                'conditions' => 'id = ?',
                'bind'       => [ 1 ],
                'bindTypes'  => [ PDO::PARAM_INT ], // paramètre facultatif
            ]
        );
        if (true === $bResultat) {
            $sSqlSelect                                         = 'SELECT * FROM utilisateurs WHERE id = :id';
            $this->view->maj_utilisateur_simple_condition_param = $this->db->fetchOne($sSqlSelect, Enum::FETCH_OBJ, [ 'id' => 1 ]);
        }

        $bResultat = $this->db->updateAsDict(
            'utilisateurs',
            [
                'prenom' => 'Dominique'
            ],
            'id = 1'
        );
        if (true === $bResultat) {
            $sSqlSelect                          = 'SELECT * FROM utilisateurs WHERE id = :id';
            $this->view->maj_utilisateur_tableau = $this->db->fetchOne($sSqlSelect, Enum::FETCH_OBJ, [ 'id' => 1 ]);
        }

        $bResultat = $this->db->updateAsDict(
            'utilisateurs',
            [
                'prenom' => 'Eloise'
            ],
            [
                'conditions' => 'id = ?',
                'bind'       => [ 1 ],
                'bindTypes'  => [ PDO::PARAM_INT ], // paramètre facultatif
            ]
        );
        if (true === $bResultat) {
            $sSqlSelect                                          = 'SELECT * FROM utilisateurs WHERE id = :id';
            $this->view->maj_utilisateur_tableau_condition_param = $this->db->fetchOne($sSqlSelect, Enum::FETCH_OBJ, [ 'id' => 1 ]);
        }
    }

    public function suppressionDeDonneesAction()
    {
        $sSqlSelect                  = 'SELECT * FROM utilisateurs ORDER BY id ASC LIMIT 3';
        $this->view->ref_utilisateur = $this->db->fetchAll($sSqlSelect, Enum::FETCH_OBJ);

        $sSqlSuppression = 'DELETE FROM utilisateurs WHERE id = ?';
        $bResultat       = $this->db->execute(
            $sSqlSuppression,
            [
                1
            ]
        );

        if (true === $bResultat) {
            $sSqlSelect                                    = 'SELECT * FROM utilisateurs ORDER BY id ASC LIMIT 3';
            $this->view->utilisateur_liste_apres_supprimer = $this->db->fetchAll($sSqlSelect, Enum::FETCH_OBJ);
        }

        $sSqlSuppression = 'DELETE FROM utilisateurs WHERE id = :id';
        $bResultat       = $this->db->execute(
            $sSqlSuppression,
            [
                'id' => 2
            ]
        );

        if (true === $bResultat) {
            $sSqlSelect                                              = 'SELECT * FROM utilisateurs ORDER BY id ASC LIMIT 3';
            $this->view->utilisateur_liste_apres_supprimer_nom_param = $this->db->fetchAll($sSqlSelect, Enum::FETCH_OBJ);
        }

        $bResultat = $this->db->delete(
            'utilisateurs',//attention tableau inversé
            'id = ?',
            [
                3
            ]
        );

        if (true === $bResultat) {
            $sSqlSelect                                                  = 'SELECT * FROM utilisateurs ORDER BY id ASC LIMIT 3';
            $this->view->utilisateur_liste_apres_supprimer_avec_fonction = $this->db->fetchAll($sSqlSelect, Enum::FETCH_OBJ);
        }

    }
}

