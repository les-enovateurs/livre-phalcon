<?php

use Phalcon\Helper\Arr;
use Phalcon\Helper\Fs;
use Phalcon\Helper\Number;
use Phalcon\Helper\Str;

class HelperController extends ControllerBase
{
    public function arrDemoAction()
    {
        $aDonnees   = [
            'loic'      => 'novateur',
            'didier'    => 'doe',
            'antoine'   => 'graphivox',
            'nicolas'   => 'data',
            'jeremy'    => 'lock'
        ];

        //Récupération de la première valeur
        $this->view->premiere_valeur = Arr::first($aDonnees);

        //Récupération de la première valeur avec un filtre
        $this->view->premiere_valeur_avec_filtre = Arr::first(
            $aDonnees,
            function ($sValeur) {
                return strlen($sValeur) > 8;
            }
        );

        //Récupération de la première clé
        $this->view->premiere_cle = Arr::firstKey($aDonnees);

        //Récupérer la première clé avec une condition
        $this->view->premiere_cle_avec_filtre = Arr::firstKey($aDonnees, function($sCle){
            return strlen($sCle) < 5;
        });

        //Récupérer la dernière valeur
        $this->view->derniere_valeur = Arr::last($aDonnees);

        //Récupérer dernière valeur avec une condition
        $this->view->derniere_valeur_avec_filtre = Arr::last($aDonnees, function($sValeur){
            return strlen($sValeur) > 6;
        });

        //Récupération de la dernière clé
        $this->view->derniere_cle = Arr::lastKey($aDonnees);

        //Récupérer la dernière clé avec une condition
        $this->view->derniere_cle_avec_filtre = Arr::lastKey($aDonnees, function($sCle){
            return strlen($sCle) > 8;
        });

        //Récupération de données
        $this->view->nom_loic = Arr::get($aDonnees, 'loic');
        //Récupération de données avec valeur par défaut
        $this->view->nom_paul = Arr::get($aDonnees, 'paul', 'doe');
        //Avec type
        $this->view->naissance = Arr::get($aDonnees, 'naissance', 2010, 'string');

        //Modifier une donnée
        $this->view->prenom_modifie = Arr::set($aDonnees, 'doe', 'jeremy');
        //Ajouter une donnée
        $this->view->prenom_ajout = Arr::set($aDonnees, 'gilbert');

        //Vérification de données
        $this->view->prenom_loic_existe = Arr::has($aDonnees, 'loic');

        //Groupement de données
        //Avec tableau
        $aDonneesPays   = [
            [ 'prenom' => 'julien', 'pays' => 'Japon' ],
            [ 'prenom' => 'louise', 'pays' => 'France' ],
            [ 'prenom' => 'jeremy', 'pays' => 'France' ],
            [ 'prenom' => 'sylvain', 'pays' => 'Japon' ],
            [ 'prenom' => 'franck', 'pays' => 'Japon']
        ];

        $this->view->tableau_groupement_par_pays = Arr::group($aDonneesPays, 'pays');

        //Par taille de caractère
        $aListeNom = [
            'jeremy',
            'louise',
            'loic',
            'paul'
        ];
        $this->view->groupement_par_taille_de_caractère = Arr::group($aListeNom, 'strlen');

        //Avec objet
        $oThierry = new \stdClass();
        $oThierry->nom = 'thierry';
        $oThierry->pays = 'France';

        $oLaetitia = new \stdClass();
        $oLaetitia->nom = 'laetitia';
        $oLaetitia->pays = 'France';

        $oIrma = new \stdClass();
        $oIrma->nom = 'irma';
        $oIrma->pays = 'Malte';

        $aDonneesObjetPays = [
            'thierry'   => $oThierry,
            'laetitia'  => $oLaetitia,
            'irma'      => $oIrma
        ];

        $this->view->objet_groupement_par_pays = Arr::group($aDonneesObjetPays, 'pays');

        //Classement de valeur
        //Classique
        $this->view->pays_classe = Arr::order($aDonneesPays, 'prenom');

        //En spécifiant le sens du tri
        $this->view->pays_classe_decroissant = Arr::order($aDonneesPays, 'prenom', 'desc');

        //Vérifie si un tableau contient uniquement des valeurs uniques
        $this->view->donnees_unique = Arr::isUnique($aDonnees);

        $aDonneesNonUnique = [
            'enovateurs',
            'graphivox',
            'enovateurs'
        ];
        $this->view->donnees_non_unique = Arr::isUnique($aDonneesNonUnique);

        //Récupérer uniquement les éléments d'une clé spécifique
        $this->view->pays_uniquement = Arr::pluck($aDonneesPays, 'pays');

        //Enlever un niveau de tableau
        $aArchitectureDonnees           = [ 'poivron', ['pomme', ['poire']], ['haricot'], 'cornichon'];
        $this->view->enlever_un_niveau  = Arr::flatten($aArchitectureDonnees);

        //Render a plat un tableau
        $this->view->tableau_plat = Arr::flatten($aArchitectureDonnees, true);

        //Découpage
        $this->view->decoupe            = Arr::chunk($aDonnees, 2);
        //conservation des clés
        $this->view->decoupe_garder_cle = Arr::chunk($aDonnees, 2, true);

        //Diviser le tableau et prendre la partie gauche
        $this->view->diviser_tableau_gauche = Arr::sliceLeft($aDonnees, 3);

        //Diviser le tableau et prendre la partie droite
        $this->view->diviser_tableau_droite = Arr::sliceRight($aDonnees, 3);

        //Transformation du tableau, Séparation des clés et des valeurs dans des tableaux séparés
        $this->view->transformer_tableau = Arr::split($aDonnees);

        //Transformation en objet
        $this->view->transformer_objet = Arr::toObject($aDonnees);

        //Validation globale des valeurs du tableau
        $this->view->validation_globale_faux = Arr::validateAll($aDonnees, function ($sElement) {
            return strlen($sElement) > 1 && strlen($sElement) < 7;
        });

        $this->view->validation_globale_vrai = Arr::validateAll($aDonnees, function ($sElement) {
            return strlen($sElement) > 1;
        });

        //Validation partielle, si une valeur est correcte le validateur renvoi vrai.
        $this->view->validation_partielle_vrai = Arr::validateAny($aDonnees, function ($sElement) {
            return strlen($sElement) > 1 && strlen($sElement) < 7;
        });

        //Filtrage de données - avec une liste d'inclusion
        $this->view->include_list = Arr::whiteList($aDonnees,[ 'didier', 'loic' ]);
    }

    public function fsDemoAction(){
        $sFichier = '/var/www/file/热のファイルλλην名爱中文.txt';
        $this->view->nom_du_fichier = Fs::basename($sFichier);
    }

    public function typeDemoAction(){
        //Number
        $this->view->intervalle_vrai = Number::between(10, 5, 20);
        $this->view->intervalle_faux = Number::between(4, 5, 20);

        //Str
        //Camelisé || Casse de chameau 
        $this->view->transforme_camelcase_tiret             = Str::camelize('unlock_my_data');
        $this->view->transforme_camelcase_multi_delimiteur  = Str::camelize('unlock-my_data', '-_');

        //DéCamelisé
        $this->view->transforme_uncamelcase_tiret         = Str::uncamelize('UnlockMyData');
        $this->view->transforme_uncamelcase_delimiteur    = Str::uncamelize('UnlockMyData','-');

        //Tiret du bas
        $this->view->tiret_du_bas = Str::underscore('Unlock My Data');

        //Concat
        $this->view->concatenation = Str::concat('/','/var','www','html','les_enovateurs');
        
        //Compter le nombre de voyelles
        $this->view->nombre_voyelles = Str::countVowels('les enovateurs');

        //Decapitalise
        $this->view->decapitalise = Str::decapitalize('Les Enovateurs');
        //Inversement majuscule/minuscule
        $this->view->decapitalise_inversement = Str::decapitalize('Les Enovateurs', true);

        //Increment -> Incrémenter un nombre dans une chaîne de caractère
        $this->view->increment                  = Str::increment('version');
        $this->view->increment_niveau_1         = Str::increment('version_1');
        $this->view->increment_avec_separateur  = Str::increment('version','.');

        //Decrement -> Décrementer un nombre dans une chaîne de caractère
        $this->view->decrement                  = Str::decrement('version_1');
        $this->view->decrement_niveau_2         = Str::decrement('version_2');
        $this->view->decrement_avec_separateur  = Str::decrement('version.2','.');

        //Génère une structure de dossier à partir d'un nom de fichier
        $this->view->generation_dossier = Str::dirFromFile("photo_profil.jpg");

        //Valide/Renvoi un nom de dossier correcte
        $this->view->valide_chemin_dossier = Str::dirSeparator("/var/www/html/site");

        //Composition de phrase aléatoire en se basant sur des termes définit.
        $this->view->phrase_aleatoire = Str::dynamic('{Jeremy|Franck|Sébastien|Camille} - {Les Enovateurs|Graphivox|Unlock My Data} - {Entreprise|Société}');

        //Changement de séparateur
        $this->view->phrase_aleatoire_separateur = Str::dynamic('Identité : [Jeremy#Franck#Sébastien#Camille] - Désignation : [Les Enovateurs#Graphivox#Unlock My Data] - Type :  [Entreprise#Société]','[',']','#');
    
        //Génération de caractères aléatoires
        //Constantes
        /* RANDOM_ALNUM
            RANDOM_ALPHA
            RANDOM_DISTINCT
            RANDOM_HEXDEC
            RANDOM_NOZERO
            RANDOM_NUMERIC
        */
        $this->view->termes_aleatoires = Str::random(Str::RANDOM_ALNUM);

        //Spécification de la taille
        $this->view->aleatoire_10 = Str::random(Str::RANDOM_ALNUM, 10);

        //Vérification des caractères en debut de texte
        $this->view->validation_debut_caracteres              = Str::startsWith('profil_0_jeremy', 'profil_');
        $this->view->validation_debut_caracteres_insensible   = Str::startsWith('profil_1_didier', 'PROFIL_');
        $this->view->validation_debut_caracteres_sensible     = Str::startsWith('profil_2_virginia', 'PROFIL_', false);
        
        //Vérification des caractères en fin de texte
        $this->view->validation_fin_caracteres              = Str::endsWith('avatar_0.jpg', 'jpg');
        $this->view->validation_fin_caracteres_insensible   = Str::endsWith('profil_0.jpg', 'JPG');
        $this->view->validation_fin_caracteres_sensible     = Str::endsWith('photo_1.jpg', 'JPG', false);

        //Vérification de la présence d'une expression/mot dans une chaîne de caractère
        $this->view->present_vrai     = Str::includes('photo', 'une photo de Jeremy');
        $this->view->present_faux     = Str::includes('photo', 'une image de Jeremy');

        //Vérifie si la chaîne de caractères est en majuscules
        $this->view->en_majuscules = Str::isUpper('GARANTIES');

        //Vérifie si la chaîne de caractères est en minuscules
        $this->view->en_minuscules = Str::isLower('garanties');

        //Vérifie si deux chaîne de caractères sont des anagrammes
        $this->view->anagramme      = Str::isAnagram('imaginer', 'migraine');
        $this->view->anagramme_faux = Str::isAnagram('imaginer', 'etoile');

        //Vérifie si la chaîne de caractères est un palindrome
        $this->view->palindrome = Str::isPalindrome('kayak');

        //Récupère la première occurence entouré de deux caractères
        $this->view->premiere_occurence_entoure = Str::firstBetween('Bonjour [nom], vous venez de recevoir [objet]', '[',']');

        //Remplace les _ et les - par des espaces pour rendre le texte plus lisible
        $this->view->plus_lisible = Str::humanize('profil_utilisateur-jeremy');
        
        //Transformation en minuscules
        $this->view->minuscules = Str::lower('LIVRE PHALCON');

        //Transformation en majuscules
        $this->view->majuscules = Str::upper('livre de Jeremy');

        //Suppression la présences multiples de slash / à l'exception de schéma connu comme https:// ftps://
        
        $this->view->suppression_slash          = Str::reduceSlashes('//enovateurs.com///raspberry/pi');
        $this->view->suppression_slash_schema   = Str::reduceSlashes('https://enovateurs.com///docker/image');

    }
}

