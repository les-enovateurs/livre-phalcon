<h1>Utilisation de Phalcon\Helper\Arr</h1>
<h2>Données</h2>
<code>        
    $aDonnees   = [
        'loic'      => 'novateur',
        'didier'    => 'doe',
        'antoine'   => 'graphivox',
        'nicolas'   => 'doe',
        'jeremy'    => 'lock'
    ];
</code>

<h2>Récupération de la première valeur</h2>
<code>Arr::first($aDonnees)</code>
<p>{{ premiere_valeur }}</p>

<h2>Récupération de la première valeur avec un filtre</h2>
<code>
    Arr::first(
        $aDonnees,
        function ($sValeur) {
            return strlen($sValeur) > 8;
        }
    );
</code>
<p>{{ premiere_valeur_avec_filtre }}</p>

<h2>Récupération de la première clé avec un filtre</h2>
<code>Arr::firstKey($aDonnees);</code>
<p>{{ premiere_cle }}</p>

<h2>Récupération de la première clé avec un filtre</h2>
<code>
    Arr::firstKey($aDonnees, function($sCle){
        return strlen($sCle) < 5;
    });
</code>
<p>{{ premiere_cle_avec_filtre }}</p>

<h2>Récupération de la dernière valeur</h2>
<code>Arr::last($aDonnees)</code>
<p>{{ derniere_valeur }}</p>

<h2>Récupération de la dernière valeur avec un filtre</h2>
<code>
    Arr::last(
        $aDonnees,
        function ($sValeur) {
            return strlen($sValeur) > 6;
        }
    );
</code>
<p>{{ derniere_valeur_avec_filtre }}</p>

<h2>Récupération de la dernière clé</h2>
<code>Arr::lastKey($aDonnees);</code>
<p>{{ derniere_cle }}</p>

<h2>Récupération de la dernière clé avec un filtre</h2>
<code>
    Arr::lastKey($aDonnees, function($sCle){
        return strlen($sCle) < 5;
    });
</code>
<p>{{ derniere_cle_avec_filtre }}</p>

<h2>Récupération de données avec la fonction get</h2>
<h3>Simple</h3>
<code>Arr::get($aDonnees, 'loic')</code>
<p>{{ nom_loic }}</p>

<h3>Avec une valeur par défaut</h3>
<code>Arr::get($aDonnees, 'paul', 'doe');</code>
<p>{{ nom_paul }}</p>

<h3>Avec une valeur par défaut et un type</h3>
<code>Arr::get($aDonnees, 'naissance', 2010, 'string');</code>
<p>{{ naissance }}</p>

<h2>Modification de donnée</h2>
<code>Arr::set($aDonnees, 'doe', 'jeremy');</code>
<p><?php print_r($prenom_modifie); ?></p>

<h2>Ajout d'une donnée</h2>
<code>Arr::set($aDonnees, 'gilbert')</code>
<p><?php print_r($prenom_ajout); ?></p>

<h2>Vérification de données</h2>
<code>Arr::has($aDonnees, 'loic');</code>
<p>{{ prenom_loic_existe }}</p>

<h2>Nouveau tableau de données</h2>
<code>
    $aDonneesPays   = [
        [ 'prenom' => 'julien', 'pays' => 'Japon' ],
        [ 'prenom' => 'louise', 'pays' => 'France' ],
        [ 'prenom' => 'jeremy', 'pays' => 'France' ],
        [ 'prenom' => 'sylvain', 'pays' => 'Japon' ],
        [ 'prenom' => 'franck', 'pays' => 'Japon']
    ];
</code>
<h2>Groupement de donnée</h2>
<h3>Par nom de colonne</h3>
<code>Arr::group($aDonneesPays, 'pays');</code>
<p><?php print_r($tableau_groupement_par_pays); ?></p>

<h3>Avec une fonction - Par longueur de caractère</h3>
<code>Arr::group($aListeNom, 'strlen');</code>
<p><?php print_r($groupement_par_taille_de_caractère); ?></p>

<h3>Avec un objet</h3>
<code>
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
    Arr::group($aDonneesObjetPays, 'pays');
</code>
<p><?php print_r($objet_groupement_par_pays); ?></p>

<h2>Tri de tableau</h2>
<h3>Par indice de colonne</h3>
<code>
    Arr::order($aDonneesPays, 'prenom');
</code>
<p><?php print_r($pays_classe); ?></p>

<h3>Par indice de colonne et en spécifiant le sens</h3>
<code>
    Arr::order($aDonneesPays, 'prenom', 'desc');
</code>
<p><?php print_r($pays_classe_decroissant); ?></p>

<h2>Vérification de l'unicité du tableau</h2>
<h3>Valide</h3>
<code>Arr::isUnique($aDonnees);</code>
<p>{{ donnees_unique }}</p>

<h3>Non-Valide</h3>
<code>
    $aDonneesNonUnique = [
        'enovateurs',
        'graphivox',
        'enovateurs'
    ];
    Arr::isUnique($aDonneesNonUnique);
</code>
<p>{{ donnees_non_unique|default(0) }}</p>

<h2>Récupérer uniquement les éléments d'une clé spécifique</h2>
<code>
    Arr::pluck($aDonneesPays, 'pays');
</code>
<p><?php print_r($pays_uniquement); ?></p>

<h2>Enlever un niveau de tableau</h2>
<code>
    $aArchitectureDonnees = [ 'poivron', ['pomme', ['poire']], ['haricot'], 'cornichon'];
    Arr::flatten($aArchitectureDonnees);
</code>
<p><?php print_r($enlever_un_niveau); ?></p>

<h2>Mise à  plat du tableau</h2>
<code>
    Arr::flatten($aArchitectureDonnees, true);
</code>
<p><?php print_r($tableau_plat); ?></p>

<h2>Découpage du tableau</h2>
<h3>Classique</h3>
<code>
    Arr::chunk($aDonnees, 2);
</code>
<p><?php print_r($decoupe); ?></p>

<h3>En conservant les clés</h3>
<p><?php print_r($decoupe_garder_cle); ?></p>

<h2>Trancher/Diviser le tableau</h2>
<h3>Récupération de la partie gauche</h3>
<code>
    Arr::sliceLeft($aDonnees, 3);
</code>
<p><?php print_r($diviser_tableau_gauche); ?></p>

<h3>Récupération de la partie droite</h3>
<code>
    Arr::sliceRight($aDonnees, 3);
</code>
<p><?php print_r($diviser_tableau_droite); ?></p>

<h3>Transformation du tableau, Séparation des clés et des valeurs dans des tableaux séparés</h3>
<code>
    Arr::split($aDonnees);
</code>
<p><?php print_r($transformer_tableau); ?></p>

<h3>Transformation en objet</h3>
<code>
    Arr::toObject($aDonnees);
</code>
<p><?php print_r($transformer_objet); ?></p>

<h2>Validation Globale</h2>
<h3>Fausse</h3>
<code>
    Arr::validateAll($aDonnees, function ($sElement) {
        return strlen($sElement) > 1 && strlen($sElement) < 7;
    });
</code>
<p>{{ validation_globale_faux|default(0) }}</p>
<h3>Vrai</h3>
<code>
    Arr::validateAll($aDonnees, function ($sElement) {
        return strlen($sElement) > 1;
    });
</code>
<p>{{ validation_globale_vrai|default(0) }}</p>

<h2>Validation Partielle, si au moins une valeur est correcte le validateur renvoi vrai</h2>
<code>
    Arr::validateAny($aDonnees, function ($sElement) {
        return strlen($sElement) > 1 && strlen($sElement) < 7;
    });
</code>
<p>{{ validation_partielle_vrai|default(0) }}</p>

<h2>Filtrage de données - avec une liste de valeur valide</h2>
<code>
    Arr::whiteList($aDonnees,[ 'didier', 'loic' ]);
</code>
<p><?php print_r($include_list); ?></p>
