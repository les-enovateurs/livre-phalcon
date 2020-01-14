<?php

use Phalcon\Mvc\View;
use HelloWorld\Models\Utilisateurs;

use Phalcon\Db\Column;
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

    public function requeteModeleAction()
    {
        $aUtilisateurs            = Utilisateurs::find();
        $this->view->utilisateurs = $aUtilisateurs;

        $oPremierUtilisateur             = Utilisateurs::findFirst();
        $this->view->premier_utilisateur = $oPremierUtilisateur;

        $aUtilisateursCadres            = Utilisateurs::findByFonction('cadre');
        $this->view->utilisateurs_cadre = $aUtilisateursCadres;

        $oPremierUtilisateurCadre              = Utilisateurs::findFirstByFonction('cadre');
        $this->view->premier_utilisateur_cadre = $oPremierUtilisateurCadre;

        $aUtilisateursColonne = Utilisateurs::find([
            'columns' => 'id, nom'
        ]);

        $this->view->utilisateurs_colonne = $aUtilisateursColonne;

        $aUtilisateurColonne = Utilisateurs::findFirst([
            'columns' => 'id, nom'
        ]);

        $this->view->utilisateur_colonne = $aUtilisateurColonne;

        $aUtilisateursConditions = Utilisateurs::find([
            'conditions' => 'fonction = ?1 and email like ?2',
            'bind'       => [
                1 => 'responsable',
                2 => '%graphivox%'
            ]
        ]);

        $this->view->utilisateurs_conditions = $aUtilisateursConditions;

        $oPremierUtilisateurConditions = Utilisateurs::findFirst([
            'conditions' => 'fonction = ?1 and email like ?2',
            'bind'       => [
                1 => 'responsable',
                2 => '%graphivox%'
            ]
        ]);

        $this->view->premier_utilisateur_conditions = $oPremierUtilisateurConditions;

        $aUtilisateursConditionsType = Utilisateurs::find([
            'conditions' => 'fonction = ?1 and email like ?2',
            'bind'       => [
                1 => 'responsable',
                2 => '%graphivox%'
            ],
            'bindTypes'  => [
                Column::BIND_PARAM_STR,
                Column::BIND_PARAM_STR
            ]
        ]);

        $this->view->utilisateurs_conditions_type = $aUtilisateursConditionsType;

        $aUtilisateursConditionsLimitation2 = Utilisateurs::find([
            'conditions' => 'fonction = ?1 and email like ?2',
            'bind'       => [
                1 => 'responsable',
                2 => '%graphivox%'
            ],
            'limit'      => 2
        ]);

        $this->view->utilisateurs_conditions_limitation_2 = $aUtilisateursConditionsLimitation2;

        $aUtilisateursConditionsLimitation4Saut2 = Utilisateurs::find([
            'conditions' => 'fonction = ?1 and email like ?2',
            'bind'       => [
                1 => 'responsable',
                2 => '%graphivox%'
            ],
            'limit'      => 4,
            'offset'     => 2
        ]);

        $this->view->utilisateurs_conditions_limitation_4_saut_2 = $aUtilisateursConditionsLimitation4Saut2;

        $aUtilisateursConditionsTri = Utilisateurs::find([
            'conditions' => 'fonction = ?1 and email like ?2',
            'bind'       => [
                1 => 'responsable',
                2 => '%graphivox%'
            ],
            'order'      => 'email DESC'
        ]);

        $this->view->utilisateurs_conditions_tri = $aUtilisateursConditionsTri;

        $aUtilisateursConditionsGroupement = Utilisateurs::find([
            'columns' => 'count(*) as nombre_par_fonction, fonction',
            'order'   => 'fonction DESC',
            'group'   => 'fonction'
        ]);

        $this->view->utilisateurs_conditions_groupement = $aUtilisateursConditionsGroupement;

        $aUtilisateursInformations             = Utilisateurs::find();
        $this->view->utilisateurs_informations = $aUtilisateursInformations;

        $this->view->nombre_utilisateurs_informations = $aUtilisateursInformations->count();

        $aUtilisateursInformations->seek(2);

        $this->view->utilisateurs_information_courant = $aUtilisateursInformations->current();

        $this->view->premier_utilisateur_information = $aUtilisateursInformations->getFirst();
        $this->view->dernier_utilisateur_information = $aUtilisateursInformations->getLast();

        /** Requête Hydration */
        $oBaseUtilisateurs = Utilisateurs::find([
                'limit' => 5
            ]
        );

        $oBaseUtilisateurs->setHydrateMode(
            Resultset::HYDRATE_ARRAYS
        );

        $this->view->utilisateurs_tableau = $oBaseUtilisateurs;

        $oBaseUtilisateursObjet = Utilisateurs::find([
                'limit' => 5
            ]
        );

        $oBaseUtilisateursObjet->setHydrateMode(
            Resultset::HYDRATE_OBJECTS
        );

        $this->view->utilisateurs_objet = $oBaseUtilisateursObjet;

        $oBaseUtilisateursRecords = Utilisateurs::find([
                'limit' => 5
            ]
        );

        $oBaseUtilisateursRecords->setHydrateMode(
            Resultset::HYDRATE_RECORDS
        );

        $this->view->utilisateurs_objet_utilisateur = $oBaseUtilisateursRecords;

        $oBaseUtilisateursArray = Utilisateurs::find([
                'limit' => 5,
                'hydration' => Resultset::HYDRATE_ARRAYS
            ]
        );

        $this->view->utilisateurs_tableau_passage_requete = $oBaseUtilisateursArray;

    }

    public function calculSQLAction()
    {
        $nCompteurUtilisateurs = Utilisateurs::count([
            'conditions' => 'email like ?1',
            'bind'       => [
                1 => '%graphivox%'
            ]
        ]);

        $this->view->compteur_utilisateurs = $nCompteurUtilisateurs;

        $nSommeSalaire = Utilisateurs::sum([
            'column'     => 'salaire',
            'conditions' => 'email like ?1',
            'bind'       => [
                1 => '%graphivox%'
            ]
        ]);

        $this->view->somme_salaire = $nSommeSalaire;

        $nMinimumSalaire = Utilisateurs::minimum([
            'column'     => 'salaire',
            'conditions' => 'email like ?1',
            'bind'       => [
                1 => '%graphivox%'
            ]
        ]);

        $this->view->minimum_salaire = $nMinimumSalaire;

        $nMoyenneSalaire = Utilisateurs::average([
            'column'     => 'salaire',
            'conditions' => 'email like ?1',
            'bind'       => [
                1 => '%graphivox%'
            ]
        ]);

        $this->view->moyenne_salaire = $nMoyenneSalaire;

        $nMaximumSalaire = Utilisateurs::maximum([
            'column'     => 'salaire',
            'conditions' => 'email like ?1',
            'bind'       => [
                1 => '%graphivox%'
            ]
        ]);

        $this->view->maximum_salaire = $nMaximumSalaire;
    }

    public function requeteSauvegardeAction()
    {
        $oUtilisateur               = new Utilisateurs();
        $oUtilisateur->prenom       = 'Eloise';
        $oUtilisateur->email        = 'eloise.doe'.uniqid().'@les-enovateurs.com';
        $oUtilisateur->mot_de_passe = 'azerty';
        $oUtilisateur->fonction     = 'cadre';

        $oUtilisateur->save();

        $oUtilisateurTableau = new Utilisateurs();

        $oUtilisateur = new Utilisateurs();
            
        $oUtilisateur->assign(
            [
                'prenom'       => 'Olivia',
                'email'        => 'olivia.doe_'.uniqid().'@les-enovateurs.com',
                'mot_de_passe' => 'azerty',
                'fonction'     => 'DPO'
            ]
        );

        $oUtilisateur->save();

        $aUtilisateurs = Utilisateurs::find([
            'limit' => 2,
            'order' => 'id DESC'
        ]);

        $this->view->liste_utilisateur = $aUtilisateurs;

    }

    public function gestionErreurAction(){
        $oUtilisateur               = new Utilisateurs();
        $oUtilisateur->prenom       = 'Eloise';
        $oUtilisateur->email        = 'eloise.doe_'.uniqid().'@les-enovateurs.com';
        $oUtilisateur->mot_de_passe = 'azerty';

        if (false === $oUtilisateur->save()) {
            $aMessages = $oUtilisateur->getMessages();

            $this->view->erreurs_sauvegarde = '';

            foreach ($aMessages as $sMessage) {
                $this->view->erreurs_sauvegarde .= $sMessage . '<br />';
            }
        }

        $aUtilisateurs = Utilisateurs::find([
            'limit' => 2,
            'order' => 'id DESC'
        ]);

        $this->view->liste_utilisateur = $aUtilisateurs;
    }

    public function formulaireSauvegardeAction()
    {
        if (true === $this->request->isPost()) {
            $oUtilisateur = new Utilisateurs();
            
            $oUtilisateur->assign(
                $_POST,
                [
                    'prenom',
                    'email',
                    'mot_de_passe',
                    'fonction'
                ]
            );

            $oUtilisateur->save();       
        }

        $aUtilisateurs = Utilisateurs::find([
            'limit' => 2,
            'order' => 'id DESC'
        ]);

        $this->view->liste_utilisateur = $aUtilisateurs;
    }

    public function majAction()
    {
        $oUtilisateur                  = Utilisateurs::findFirst();

        $this->view->utilisateur_avant = clone $oUtilisateur;
        
        if($oUtilisateur instanceof Utilisateurs){
            $oUtilisateur->nom = 'PAUL_' . uniqid();
    
            $oUtilisateur->save();
        }

        $oUtilisateurUpdate            = Utilisateurs::findFirstById($oUtilisateur->id);
        $this->view->utilisateur_apres = $oUtilisateurUpdate;
    }

    public function forceSauvegardeAction()
    {

        $oUtilisateurTableau = new Utilisateurs();

        $oUtilisateurTableau->assign(
            [
                'prenom'       => 'Catherine',
                'email'        => 'catherine.doe'.uniqid().'@les-enovateurs.com',
                'mot_de_passe' => 'azerty',
                'fonction'     => 'Responsable'
            ]
        );

        $oUtilisateurTableau->create();

        $aUtilisateurs = Utilisateurs::find([
            'limit' => 2,
            'order' => 'id DESC'
        ]);

        $this->view->liste_utilisateur = $aUtilisateurs;
    }

    public function forceMAJAction()
    {
        $oUtilisateur                  = Utilisateurs::findFirstById(2);
        $this->view->utilisateur_avant = clone $oUtilisateur;

        if($oUtilisateur instanceof Utilisateurs){
            $oUtilisateur->nom = 'PAUL_' . uniqid();
    
            $oUtilisateur->update();
        }

        $oUtilisateurUpdate            = Utilisateurs::findFirstById(2);
        $this->view->utilisateur_apres = $oUtilisateurUpdate;
    }

    public function suppressionAction()
    {
        $aUtilisateurs = Utilisateurs::find([
            'limit' => 5,
            'order' => 'id DESC'
        ]);

        $this->view->liste_utilisateur_avant_suppression = json_decode(json_encode($aUtilisateurs->toArray()));

        $oDernierUtilisateur = $aUtilisateurs->getLast();
        
        $this->view->utilisateur_supprime = $oDernierUtilisateur;

        if($oDernierUtilisateur instanceof Utilisateurs){
            $oDernierUtilisateur->delete();
        }

        $aUtilisateurs = Utilisateurs::find([
            'limit' => 5,
            'order' => 'id DESC'
        ]);

        $this->view->liste_utilisateur_apres_suppression = $aUtilisateurs;
    }
}

