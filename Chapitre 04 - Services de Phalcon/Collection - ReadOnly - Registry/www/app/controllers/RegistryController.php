<?php

use Phalcon\Registry;

class RegistryController extends ControllerBase
{
    public function demoAction()
    {
        //Création
        $aDonnees = [
            'prenom' => [
                'Didier',
                'Christine',
                'Pascal',
            ],
            'nombre'   => '1776',
        ];
        
        $oRegistry = new Registry($aDonnees);
        
        //taille tableau
        $this->view->taille_tableau_debut = $oRegistry->count();

        //Réutilisation
        $aDonnees = [
            'site' => [
                'graphivox',
                'les_enovateurs',
                'unlock-my-data',
            ],
            'annee'   => 2014,
            'securise' => true
        ];
        
        $oRegistry->clear();
        $oRegistry->init($aDonnees);

        $this->view->taille_tableau_modifie = $oRegistry->count();

        //accès aux données
        $this->view->annee                  = $oRegistry->annee;
        $this->view->annee_fonction_avance  = $oRegistry->get('annee',2000,'int');
        $this->view->annee_tableau          = $oRegistry['annee'];
        $this->view->annee_fonction         = $oRegistry->__get('annee');
        $this->view->annee_offset           = $oRegistry->offsetGet('annee');
        
        //Verification de la présence de la données
        $this->view->has_annee      = $oRegistry->has('annee');
        $this->view->isset_annee    = isset($oRegistry->annee);
        $this->view->isset_t_annee  = isset($oRegistry['annee']);        
        $this->view->__isset_annee  = $oRegistry->__isset('annee');
        $this->view->offset_annee   = $oRegistry->offsetExists('annee');


        //Modification de données
        $oRegistry->annee = 2015;
        $oRegistry->set('annee', 2015);
        $oRegistry['annee'] = 2015;
        $oRegistry->__set('annee', 2015);
        $oRegistry->offsetSet('annee', 2015);

        //Vérification
        $this->view->annee_apres = $oRegistry->annee;

        
        //Ajout d'une nouvelle propriété
        $oRegistry->set('articles', 10000);
        $oRegistry['commentaires'] = 200000;
        
        //Vérification
        $this->view->articles       = $oRegistry->articles;
        $this->view->commentaires   = $oRegistry->commentaires;


        //Suppression de données
        $oRegistry->remove('commentaires'); 
        unset($oRegistry['commentaires']);
        $oRegistry->offsetUnset('commentaires');
        $oRegistry->__unset('commentaires');

        //Vérification
        $this->view->has_commentaires   = $oRegistry->has('commentaires');

        $aDonneesPrenoms = [
            'Didier'    => 'DOE',
            'Christine' => 'DOE',
            'Pascal'    => 'DOE'
        ];
        
        $oRegistryPrenom = new Registry($aDonneesPrenoms);

        //Parcours simple PHP
        $sListePHP = '';
        foreach ($oRegistryPrenom as $sCle => $sValeur) {
            $sListePHP .= '<p>'. $sCle . ' : ' . $sValeur . '</p>';
        }
        $this->view->liste_php = $sListePHP;

        //Parcours Volt
        $this->view->registry_volt = $oRegistryPrenom;

        //Serialisation
        $sSerialisationClassique                = $oRegistry->serialize();
        $this->view->serialisation_classique    = $sSerialisationClassique;

        //UnSerialisation
        $oRegistrySimple  = new Registry();
        $oRegistrySimple->unserialize($sSerialisationClassique);

        $this->view->registry_simple = $oRegistrySimple;

        //Transformation de la donnée
        //Tableau
        $this->view->vers_tableau = $oRegistry->toArray();

        //Json
        $this->view->vers_json          = $oRegistry->toJson();
        $this->view->vers_json_parametre= $oRegistry->toJson(JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);        
    }
}