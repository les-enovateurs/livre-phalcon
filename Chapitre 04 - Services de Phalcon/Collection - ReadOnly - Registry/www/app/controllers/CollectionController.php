<?php

use Phalcon\Collection;
use Phalcon\Collection\ReadOnly;

class CollectionController extends ControllerBase
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
        
        $oCollection = new Collection($aDonnees);
        
        //taille tableau
        $this->view->taille_tableau_debut = $oCollection->count();

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
        
        $oCollection->clear();
        $oCollection->init($aDonnees);

        $this->view->taille_tableau_modifie = $oCollection->count();

        //accès aux données
        $this->view->annee                  = $oCollection->annee;
        $this->view->annee_fonction_avance  = $oCollection->get('annee',2000,'int');
        $this->view->annee_tableau          = $oCollection['annee'];
        $this->view->annee_fonction         = $oCollection->__get('annee');
        $this->view->annee_offset           = $oCollection->offsetGet('annee');
        
        //Verification de la présence de la données
        $this->view->has_annee      = $oCollection->has('annee');
        $this->view->isset_annee    = isset($oCollection->annee);
        $this->view->isset_t_annee  = isset($oCollection['annee']);        
        $this->view->__isset_annee  = $oCollection->__isset('annee');
        $this->view->offset_annee   = $oCollection->offsetExists('annee');


        //Modification de données
        $oCollection->annee = 2015;
        $oCollection->set('annee', 2015);
        $oCollection['annee'] = 2015;
        $oCollection->__set('annee', 2015);
        $oCollection->offsetSet('annee', 2015);

        //Vérification
        $this->view->annee_apres = $oCollection->annee;

        
        //Ajout d'une nouvelle propriété
        $oCollection->set('articles', 10000);
        $oCollection['commentaires'] = 200000;
        
        //Vérification
        $this->view->articles       = $oCollection->articles;
        $this->view->commentaires   = $oCollection->commentaires;


        //Suppression de données
        $oCollection->remove('commentaires'); 
        unset($oCollection['commentaires']);
        $oCollection->offsetUnset('commentaires');
        $oCollection->__unset('commentaires');

        //Vérification
        $this->view->has_commentaires   = $oCollection->has('commentaires');

        $aDonneesPrenoms = [
            'Didier'    => 'DOE',
            'Christine' => 'DOE',
            'Pascal'    => 'DOE'
        ];
        
        $oCollectionPrenom = new Collection($aDonneesPrenoms);

        //Parcours simple PHP
        $sListePHP = '';
        foreach ($oCollectionPrenom as $sCle => $sValeur) {
            $sListePHP .= '<p>'. $sCle . ' : ' . $sValeur . '</p>';
        }
        $this->view->liste_php = $sListePHP;

        //Parcours Volt
        $this->view->collection_volt = $oCollectionPrenom;

        //Serialisation
        $sSerialisationClassique                = $oCollection->serialize();
        $this->view->serialisation_classique    = $sSerialisationClassique;

        //UnSerialisation
        $oCollectionSimple  = new Collection();
        $oCollectionSimple->unserialize($sSerialisationClassique);

        $this->view->collection_simple = $oCollectionSimple;

        //Transformation de la donnée
        //Tableau
        $this->view->vers_tableau = $oCollection->toArray();

        //Json
        $this->view->vers_json          = $oCollection->toJson();
        $this->view->vers_json_parametre= $oCollection->toJson(JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);

        //Lecture seule
        $oCollectionLectureSeule = new ReadOnly($aDonnees);
        try{
            $oCollectionLectureSeule->set('annee', 2020);
        }
        catch(\Exception $e){
            $this->view->message_erreur = $e->getMessage();
        }
        
    }
}