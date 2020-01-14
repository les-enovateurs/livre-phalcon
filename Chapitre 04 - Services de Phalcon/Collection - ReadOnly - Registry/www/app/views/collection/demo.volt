<h1>Gestion des collections</h1>
<h2>Première collection</h2>
<code>
    $aDonnees = [
    'prenom' => [
        'Didier',
        'Christine',
        'Pascal',
    ],
    'nombre'   => '1776',
];

$oCollection = new Collection($aDonnees);
</code>
<p>Taille de la collection {{ taille_tableau_debut }}</p>
<h2>Réutilisation de la collection</h2>
<code>
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
</code>
<p>Taille de la collection {{ taille_tableau_modifie }}</p>

<h2>Accès aux données</h2>
<ul>
    <li><code>$oCollection->annee</code> => {{ annee }}</li>
    <li><code>$oCollection->get('annee',2000,'int')</code> => {{ annee_fonction_avance }}</li>
    <li><code>$oCollection['annee']</code> => {{ annee_tableau }}</li>
    <li><code>$oCollection->__get('annee')</code> => {{ annee_fonction }}</li>
    <li><code>$oCollection->offsetGet('annee')</code> => {{ annee_offset }}</li>
</ul>

<h2>Vérification de la présence d'un élément</h2>
<ul>
    <li><code>$oCollection->has('annee')</code> => {{ has_annee }}</li>
    <li><code>isset($oCollection->annee)</code> => {{ isset_annee }}</li>
    <li><code>isset($oCollection['annee'])</code> => {{ isset_t_annee }}</li>
    <li><code>$oCollection->__isset('annee')</code> => {{ __isset_annee }}</li>
    <li><code>$oCollection->offsetExists('annee')</code> => {{ offset_annee }}</li>
</ul>

<h2>Modification d'une valeur</h2>
<code>
    $oCollection->set('annee', 2015);
    $oCollection['annee'] = 2015;
    $oCollection->__set('annee', 2015);
    $oCollection->offsetSet('annee', 2015);
</code>
<p>Contrôle de la valeur : {{ annee_apres }}</p>

<h2>Ajout d'une valeur</h2>
<code>
    $oCollection->set('articles', 10000);
    $oCollection['commentaires'] = 200000;
</code>
<p>Contrôle des valeurs :</p>
<p>Articles : {{ articles }}</p>
<p>Commentaires : {{ commentaires }}</p>

<h2>Suppression d'une valeur</h2>
<code>
    $oCollection->remove('commentaires'); 
    unset($oCollection['commentaires']);
    $oCollection->offsetUnset('commentaires');
    $oCollection->__unset('commentaires');
</code>
<p>Commentaire existe ? {{ has_commentaires|default(0) }}</p>

<h2>Parcours PHP</h2>
<code>
    $sListePHP = '';
    foreach ($oCollectionPrenom as $sCle => $sValeur) {
        $sListePHP .= '&lt;p&gt;'. $sCle . ' : ' . $sValeur . '&lt;/p&gt;';
    }
</code>
<p>Affichage de la chaîne</p>
<p>{{ liste_php }}</p>

<h2>Parcours avec Volt</h2>
{% for cle,valeur in collection_volt %}
    <p>{{ cle }} : {{ valeur }}</p>
{% endfor%}

<h2>Serialisation</h2>
<code>
    $oCollection->serialize();
</code>
<p>{{ serialisation_classique }}</p>

<h2>Déserialise</h2>
<code>   
    $oCollectionSimple->unserialize($sSerialisationClassique);
</code>
{% for cle,valeur in collection_simple %}
    {% if valeur is type('array') %}
        <p>{{ cle }} : {{ valeur|join(',') }}</p>
    {% else %}
        <p>{{ cle }} : {{ valeur }}</p>
    {% endif %}
{% endfor%}

<h2>Transformation</h2>
<h3>En tableau</h3>
<code>$oCollection->toArray();</code>
<p><?php print_r($vers_tableau) ?></p>

<h3>En Json</h3>
<h4>Simple</h4>
<code>$oCollection->toJson();</code>
<p>{{ vers_json }}</p>

<h4>Avec Paramètre</h4>
<code>$oCollection->toJson(JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);</code>
<p>{{ vers_json_parametre }}</p>

<h4>Lecture seule</h4>
<code>
    $oCollectionLectureSeul = new ReadOnly($aDonnees);
    try{
        $oCollectionLectureSeul->set('annee', 2020);
    }
    catch(\Exception $e){
        $this->view->message_erreur = $e->getMessage();
    }
</code>
<p>Message d'erreur : {{ message_erreur }}</p>