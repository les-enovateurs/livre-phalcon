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

    public function constructeurRequeteAction()
    {
        $aUtilisateurs = $this->modelsManager->createBuilder()
            ->from('HelloWorld\Models\Utilisateurs')
            ->getQuery()->execute();
        $this->view->liste_utilisateurs = $aUtilisateurs;

        $oUtilisateurSimple = $this->modelsManager->createBuilder()
            ->from('HelloWorld\Models\Utilisateurs')
            ->getQuery()
            ->getSingleResult();

        $this->view->un_utilisateur_simple = $oUtilisateurSimple;

        $aUtilisateursLimit = $this->modelsManager->createBuilder()
            ->from('HelloWorld\Models\Utilisateurs')
            ->limit(2)
            ->getQuery()
            ->execute();
        $this->view->liste_utilisateurs_limite = $aUtilisateursLimit;

        $aUtilisateursOffset = $this->modelsManager->createBuilder()
            ->from('HelloWorld\Models\Utilisateurs')
            ->limit(2,3)
            ->getQuery()
            ->execute();
        $this->view->liste_utilisateurs_limite_offset = $aUtilisateursOffset;

        $oUtilisateurEntreprise = $this->modelsManager->createBuilder()
            ->from([
                'HelloWorld\Models\Utilisateurs',
                'HelloWorld\Models\Entreprises',
            ])->getQuery()
            ->getSingleResult();

        $this->view->utilisateur_entreprise = $oUtilisateurEntreprise;

        $oResultat = $this->modelsManager->createBuilder()
            ->columns('*')
            ->from('HelloWorld\Models\Utilisateurs')
            ->join('HelloWorld\Models\Entreprises')
            ->getQuery()->getSingleResult();

        $this->view->prenom_join = $oResultat
            ->readAttribute('helloWorld\Models\Utilisateurs')
            ->prenom;

        $this->view->nom_join = $oResultat
            ->readAttribute('helloWorld\Models\Entreprises')
            ->nom;

        $oUtilisateurJointureSimpleTouteColonne = $this->modelsManager->createBuilder()
            ->columns('*')
            ->from('HelloWorld\Models\Utilisateurs')
            ->join('HelloWorld\Models\Entreprises')
            ->getQuery()->getSingleResult();

        $this->view->utilisateur_jointure_simple_toutes_colonnes = $oUtilisateurJointureSimpleTouteColonne;

        $oUtilisateurJointureColonne = $this->modelsManager->createBuilder()
            ->columns(
                [
                    'prenom' => 'HelloWorld\Models\Utilisateurs.prenom'
                ]
            )
            ->from('HelloWorld\Models\Utilisateurs')
            ->join('HelloWorld\Models\Entreprises')
            ->getQuery()->getSingleResult();

        $this->view->utilisateur_jointure_colonne = $oUtilisateurJointureColonne;

        $oUtilisateurJointureColonnes = $this->modelsManager->createBuilder()
            ->columns(
                [
                    'prenom' => 'HelloWorld\Models\Utilisateurs.prenom',
                    'nom' => 'HelloWorld\Models\Utilisateurs.nom'
                ]
            )
            ->from('HelloWorld\Models\Utilisateurs')
            ->join('HelloWorld\Models\Entreprises')
            ->getQuery()->getSingleResult();

        $this->view->utilisateur_jointure_colonnes = $oUtilisateurJointureColonnes;

        $oUtilisateurJointureAvecAlias = $this->modelsManager->createBuilder()
            ->columns([ 'prenom' => 'utilisateur.prenom','nom' => 'entreprise.nom' ])
            ->from(
                [
                    'utilisateur' => 'HelloWorld\Models\Utilisateurs'
                ]
            )
            ->join(
                'HelloWorld\Models\Entreprises',
                null,
                'entreprise'
            )
            ->getQuery()->getSingleResult();

        $this->view->utilisateur_jointure_avec_alias = $oUtilisateurJointureAvecAlias;

        $oUtilisateurJointureManuelleAvecAlias = $this->modelsManager->createBuilder()
            ->columns([ 'prenom' => 'utilisateur.prenom','nom' => 'entreprise.nom' ])
            ->from(
                [
                    'utilisateur' => 'HelloWorld\Models\Utilisateurs'
                ]
            )
            ->join(
                'HelloWorld\Models\Entreprises',
                'utilisateur.entreprises_id=entreprise.id',
                'entreprise'
            )
            ->getQuery()->getSingleResult();

        $this->view->utilisateur_jointure_manuelle_avec_alias = $oUtilisateurJointureManuelleAvecAlias;

        $aUtilisateurJointureColonneConditionsSimple = $this->modelsManager->createBuilder()
            ->columns(['prenom' => 'HelloWorld\Models\Utilisateurs.prenom'])
            ->from('HelloWorld\Models\Utilisateurs')
            ->join('HelloWorld\Models\Entreprises')
            ->where(
                'HelloWorld\Models\Utilisateurs.prenom LIKE :prenom:',
                [
                    'prenom' => '%o%'
                ]
            )
            ->getQuery()->execute();

        $this->view->utilisateurs_jointure_colonne_conditions_simple = $aUtilisateurJointureColonneConditionsSimple;

        $aUtilisateurJointureColonneConditionsEt = $this->modelsManager->createBuilder()
            ->columns(['prenom' => 'HelloWorld\Models\Utilisateurs.prenom'])
            ->from('HelloWorld\Models\Utilisateurs')
            ->join('HelloWorld\Models\Entreprises')
            ->where(
                'HelloWorld\Models\Utilisateurs.prenom LIKE :prenom:',
                [
                    'prenom' => '%o%'
                ]
            )
            ->andWhere(
                'HelloWorld\Models\Entreprises.id = :id:',
                [
                    'id' => 2
                ]
            )
            ->getQuery()->execute();

        $this->view->utilisateurs_jointure_colonne_conditions_et = $aUtilisateurJointureColonneConditionsEt;

        $aUtilisateurJointureColonneAvecConditionsOu = $this->modelsManager->createBuilder()
            ->columns(['prenom' => 'HelloWorld\Models\Utilisateurs.prenom'])
            ->from('HelloWorld\Models\Utilisateurs')
            ->join('HelloWorld\Models\Entreprises')
            ->where(
                'HelloWorld\Models\Utilisateurs.prenom LIKE :prenom:',
                [
                    'prenom' => '%o%'
                ]
            )
            ->orWhere(
                'HelloWorld\Models\Entreprises.id = :id:',
                [
                    'id' => 1
                ]
            )
            ->getQuery()->execute();

        $this->view->utilisateurs_jointure_colonne_conditions_ou = $aUtilisateurJointureColonneAvecConditionsOu;

        $aUtilisateurJointureColonnesConditionsEntre = $this->modelsManager->createBuilder()
            ->columns([ 'prenom' => 'HelloWorld\Models\Utilisateurs.prenom','nom' => 'HelloWorld\Models\Utilisateurs.nom' ])
            ->from('HelloWorld\Models\Utilisateurs')
            ->join('HelloWorld\Models\Entreprises')
            ->betweenWhere('HelloWorld\Models\Utilisateurs.id', 4, 8)
            ->getQuery()->execute();

        $this->view->utilisateurs_jointure_colonnes_conditions_entre = $aUtilisateurJointureColonnesConditionsEntre;

        $aUtilisateursConditionListeValeur = $this->modelsManager->createBuilder()
            ->columns([ 'prenom' => 'HelloWorld\Models\Utilisateurs.prenom','fonction' => 'HelloWorld\Models\Utilisateurs.fonction' ])
            ->from('HelloWorld\Models\Utilisateurs')
            ->join('HelloWorld\Models\Entreprises')
            ->inWhere(
                'HelloWorld\Models\Utilisateurs.fonction',
                [
                    'CTO', 'responsable', 'cadre'
                ]
            )
            ->getQuery()->execute();

        $this->view->utilisateurs_condition_liste_valeur = $aUtilisateursConditionListeValeur;

        $aUtilisateursConditionPasDansListeValeur = $this->modelsManager->createBuilder()
            ->columns(['prenom' => 'HelloWorld\Models\Utilisateurs.prenom','fonction' => 'HelloWorld\Models\Utilisateurs.fonction' ])
            ->from('HelloWorld\Models\Utilisateurs')
            ->join('HelloWorld\Models\Entreprises')
            ->notInWhere(
                'HelloWorld\Models\Utilisateurs.fonction',
                [
                    'CTO', 'responsable', 'cadre'
                ]
            )
            ->getQuery()->execute();

        $this->view->utilisateurs_condition_pas_dans_liste_valeur = $aUtilisateursConditionPasDansListeValeur;

        $aUtilisateurGroupByNom = $this->modelsManager->createBuilder()
            ->columns([ 'nom' => 'HelloWorld\Models\Utilisateurs.nom','nombre' => 'COUNT(HelloWorld\Models\Utilisateurs.nom)' ])
            ->from('HelloWorld\Models\Utilisateurs')
            ->join('HelloWorld\Models\Entreprises')
            ->groupBy('HelloWorld\Models\Utilisateurs.nom')
            ->getQuery()->execute();

        $this->view->utilisateurs_groupby_nom = $aUtilisateurGroupByNom;

        $aUtilisateurGroupByEntrepriseHaving = $this->modelsManager->createBuilder()
            ->columns(
                [
                    'nom' => 'HelloWorld\Models\Entreprises.nom',
                    'nombre_employees' => 'COUNT(HelloWorld\Models\Utilisateurs.nom)'
                ]
            )
            ->from('HelloWorld\Models\Utilisateurs')
            ->join('HelloWorld\Models\Entreprises')
            ->groupBy('HelloWorld\Models\Entreprises.nom')
            ->having(
                'COUNT(HelloWorld\Models\Utilisateurs.nom) > :nombre:',
                [
                    'nombre' => 2
                ]
            )
            ->getQuery()->execute();

        $this->view->utilisateurs_groupby_nom_having = $aUtilisateurGroupByEntrepriseHaving;

        $aUtilisateursParametresExecute = $this->modelsManager->createBuilder()
            ->columns(
                [
                    'nom' => 'HelloWorld\Models\Entreprises.nom',
                    'nombre_employees' => 'COUNT(HelloWorld\Models\Utilisateurs.nom)'
                ]
            )
            ->from('HelloWorld\Models\Utilisateurs')
            ->join('HelloWorld\Models\Entreprises')
            ->where('HelloWorld\Models\Entreprises.nom LIKE :nom:')
            ->groupBy('HelloWorld\Models\Entreprises.nom')
            ->having('COUNT(HelloWorld\Models\Utilisateurs.nom) > :nombre:')
            ->getQuery()->execute(
                [
                    'nom'    => '%u%',
                    'nombre' => 1
                ]
            );

        $this->view->utilisateurs_parametres = $aUtilisateursParametresExecute;
    }
}

