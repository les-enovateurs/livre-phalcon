<?php

use HelloWorld\Models\Utilisateurs;

class IndexController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function utilisateurCacheSimpleAction(){
        // Récupération du cache
        $oCache = $this->di->get('cache');

        // Identifiant du fichier en cache
        $sCleCache = 'utilisateurs.cache_simple';

        // Tentative de récupération de la liste des utilisateurs en cache
        $aUtilisateurs = $oCache->get($sCleCache);

        // Si la donnée récupéré est null, cela signifie que le cache n'a pas été initialisé
        if ($aUtilisateurs === null) {

            //Récupération de la liste des utilisateurs
            $aUtilisateurs = Utilisateurs::find();

            // Enregistrement de la liste dans le cache
            $oCache->save($sCleCache, $aUtilisateurs);

            $this->view->utilisation_cache = false;
        }
        else{
            $this->view->utilisation_cache = true;
        }

        //Renvoi de la liste des utilisateurs à la vue
        $this->view->utilisateurs = $aUtilisateurs;
    }

    public function utilisateurCacheExpirationAction(){
        // Récupération du cache
        $oCache = $this->di->get('cache');

        // Identifiant du fichier en cache
        $sCleCache = 'utilisateurs.cache_expiration_3600';

        // Tentative de récupération de la liste des utilisateurs en cache
        // Le cache expire au bout de 3600 secondes
        $aUtilisateurs = $oCache->get($sCleCache,3600);

        // Si la donnée récupéré est null, cela signifie que le cache n'a pas été initialisé
        if ($aUtilisateurs === null) {

            //Récupération de la liste des utilisateurs
            $aUtilisateurs = Utilisateurs::find();

            // Enregistrement de la liste dans le cache
            $oCache->save($sCleCache, $aUtilisateurs);

            $this->view->utilisation_cache = false;
        }
        else{
            $this->view->utilisation_cache = true;
        }

        //Renvoi de la liste des utilisateurs à la vue
        $this->view->utilisateurs = $aUtilisateurs;
    }

    public function utilisateurCacheExpirationSauvegardeAction(){
        // Récupération du cache
        $oCache = $this->di->get('cache');

        // Identifiant du fichier en cache
        $sCleCache = 'utilisateurs.cache_expiration_sauvegarde_3600';

        // Tentative de récupération de la liste des utilisateurs en cache
        // Le cache expire au bout de 3600 secondes
        $aUtilisateurs = $oCache->get($sCleCache);

        // Si la donnée récupéré est null, cela signifie que le cache n'a pas été initialisé
        if ($aUtilisateurs === null) {

            //Récupération de la liste des utilisateurs
            $aUtilisateurs = Utilisateurs::find();

            // Enregistrement de la liste dans le cache
            $oCache->save($sCleCache, $aUtilisateurs, 3600);

            $this->view->utilisation_cache = false;
        }
        else{
            $this->view->utilisation_cache = true;
        }

        //Renvoi de la liste des utilisateurs à la vue
        $this->view->utilisateurs = $aUtilisateurs;
    }

    public function listeElementCacheAction(){
        $oCache = $this->di->get('cache');

        $aClesCache = $oCache->queryKeys();

        $aDonneesCache = [];

        foreach ($aClesCache as $sCleCache) {
            $sCleCache                 = str_replace($oCache->getOptions('prefix'),'',$sCleCache);
            $aDonnees                  = $oCache->get($sCleCache);
            $aDonneesCache[$sCleCache] = $aDonnees;
        }

        $this->view->liste_cle_cache  = $aClesCache;
        $this->view->donnees_cache    = $aDonneesCache;
    }

    public function rechercheCleCacheAction(){
        $oCache = $this->di->get('cache');

        // Recherche les clés commençant par uti
        $aCleCache = $oCache->queryKeys('uti');

        $this->view->cle_trouve = $aCleCache;
    }

    public function suppressionCacheAction(){
        $oCache = $this->di->get('cache');

        $sCleCache = 'utilisateurs.cache_simple';

        //vérification de l'existance
        if (true === $oCache->exists($sCleCache)) {
            //suppression du cache
            $oCache->delete($sCleCache);

            $this->view->cache_supprime = true;
        }
        else{
            $this->view->cache_supprime = false;
        }

    }

    public function suppressionToutCacheAction(){

        $oCache = $this->di->get('cache');

        $aClesCache = [
            'utilisateurs.cache_simple',
            'utilisateurs.cache_expiration_3600',
            'utilisateurs.cache_expiration_sauvegarde_3600'
        ];

        foreach($aClesCache as $sCleCache){
            //vérification de l'existance
            if (true === $oCache->exists($sCleCache)) {
                //suppression du cache
                $oCache->delete($sCleCache);
            }
        }
    }
}

