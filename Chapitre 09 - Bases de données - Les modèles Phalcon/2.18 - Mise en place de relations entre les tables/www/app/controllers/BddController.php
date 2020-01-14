<?php

use Phalcon\Mvc\View;
use HelloWorld\Models\Utilisateurs;
use HelloWorld\Models\Entreprises;
use HelloWorld\Models\InformationsLegales;
use HelloWorld\Models\Produits;
use HelloWorld\Models\UtilisateursAchatsProduits;

class BddController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function connexionSQLAction()
    {
        $this->view->utilisateurs = Utilisateurs::find();
    }

    public function liaisonAction()
    {
        $oUtilisateur = Utilisateurs::findFirst();

        if ($oUtilisateur instanceof Utilisateurs) {
            $this->view->utilisateur = $oUtilisateur;

            $oUtilisateurEntreprise = $oUtilisateur->entreprise;

            if ($oUtilisateurEntreprise instanceof Entreprises) {

                $this->view->utilisateur_entreprise = $oUtilisateurEntreprise;

                $oEntrepriseInformationsLegales = $oUtilisateurEntreprise->informationsLegales;

                if ($oEntrepriseInformationsLegales instanceof InformationsLegales) {
                    $this->view->entreprise_informations_legales = $oEntrepriseInformationsLegales;
                }
            }

            $aAchatProduit = $oUtilisateur->achatProduits;
            if (count($aAchatProduit) > 0) {
                $this->view->utilisateur_achat_produits = $aAchatProduit;
            }
        }

        $oInformationsLegales = InformationsLegales::findFirstByEntreprisesId(2);
        if ($oInformationsLegales instanceof InformationsLegales) {

            $this->view->informations_legales = $oInformationsLegales;

            $oInformationsLegalesEntreprise = $oInformationsLegales->entreprise;
            if ($oInformationsLegalesEntreprise instanceof Entreprises) {
                $this->view->informations_legales_entreprise = $oInformationsLegalesEntreprise;
            }
        }

        $oProduit = Produits::findFirst();

        if ($oProduit instanceof Produits) {

            $this->view->produit = $oProduit;

            $aProduitUtilisateurs = $oProduit->utilisateursAchat;
            if (count($aProduitUtilisateurs) > 0) {
                $this->view->produit_utilisateurs = $aProduitUtilisateurs;
            }
        }

        $oEntreprise = Entreprises::findFirstById(2);
        if ($oEntreprise instanceof Entreprises) {

            $this->view->entreprise = $oEntreprise;


            $aEntrepriseUtilisateurs = $oEntreprise->utilisateurs;
            if (count($aEntrepriseUtilisateurs) > 0) {
                $this->view->entreprise_utilisateurs = $aEntrepriseUtilisateurs;
            }

            $aEntrepriseUtilisateursAvecUnA = $oEntreprise->getUtilisateurs([
                'conditions' => 'prenom like :prenom:',
                'bind'       => [
                    'prenom' => '%a%'
                ]
            ]);
            if (count($aEntrepriseUtilisateursAvecUnA) > 0) {
                $this->view->entreprise_utilisateurs_avec_un_a = $aEntrepriseUtilisateursAvecUnA;
            }

            $this->view->nombre_utilisateurs = $oEntreprise->countUtilisateurs();

            $aEntrepriseUtilisateursCadre = $oEntreprise->getUtilisateurCadre();
            if (count($aEntrepriseUtilisateursCadre) > 0) {
                $this->view->entreprise_utilisateurs_cadre = $aEntrepriseUtilisateursCadre;
            }

            $aEntrepriseUtilisateursCTO = $oEntreprise->getUtilisateurCTO();
            if (count($aEntrepriseUtilisateursCTO) > 0) {
                $this->view->entreprise_utilisateurs_cto = $aEntrepriseUtilisateursCTO;
            }

            $aEntrepriseUtilisateursAutres = $oEntreprise->getUtilisateurAutres();
            if (count($aEntrepriseUtilisateursAutres) > 0) {
                $this->view->entreprise_utilisateurs_autres = $aEntrepriseUtilisateursAutres;
            }
        }

        $oUtilisateurAchat = new UtilisateursAchatsProduits();
        $oUtilisateurAchat->produits_id=1;
        $oUtilisateurAchat->quantite = 3;
        $oUtilisateurAchat->save();

        if (false === $oUtilisateurAchat->save()) {
            $aMessages = $oUtilisateurAchat->getMessages();
        
            $this->view->erreurs_sauvegarde = '';
        
            foreach ($aMessages as $sMessage) {
                $this->view->erreurs_sauvegarde .= $sMessage . '<br />';
            }
        }
        
    }
}

