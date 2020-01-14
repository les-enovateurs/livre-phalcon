<h1>Gestion des registrys</h1>
<h2>Première registry</h2>
<code>
    $aDonnees = [
    'prenom' => [
        'Didier',
        'Christine',
        'Pascal',
    ],
    'nombre'   => '1776',
];

$oRegistry = new Registry($aDonnees);
</code>
<p>Taille de la registry {{ taille_tableau_debut }}</p>
<h2>Réutilisation de la registry</h2>
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

$oRegistry->clear();
$oRegistry->init($aDonnees);
</code>
<p>Taille de la registry {{ taille_tableau_modifie }}</p>

<h2>Accès aux données</h2>
<ul>
    <li><code>$oRegistry->annee</code> => {{ annee }}</li>
    <li><code>$oRegistry->get('annee',2000,'int')</code> => {{ annee_fonction_avance }}</li>
    <li><code>$oRegistry['annee']</code> => {{ annee_tableau }}</li>
    <li><code>$oRegistry->__get('annee')</code> => {{ annee_fonction }}</li>
    <li><code>$oRegistry->offsetGet('annee')</code> => {{ annee_offset }}</li>
</ul>

<h2>Vérification de la présence d'un élément</h2>
<ul>
    <li><code>$oRegistry->has('annee')</code> => {{ has_annee }}</li>
    <li><code>isset($oRegistry->annee)</code> => {{ isset_annee }}</li>
    <li><code>isset($oRegistry['annee'])</code> => {{ isset_t_annee }}</li>
    <li><code>$oRegistry->__isset('annee')</code> => {{ __isset_annee }}</li>
    <li><code>$oRegistry->offsetExists('annee')</code> => {{ offset_annee }}</li>
</ul>

<h2>Modification d'une valeur</h2>
<code>
    $oRegistry->set('annee', 2015);
    $oRegistry['annee'] = 2015;
    $oRegistry->__set('annee', 2015);
    $oRegistry->offsetSet('annee', 2015);
</code>
<p>Contrôle de la valeur : {{ annee_apres }}</p>

<h2>Ajout d'une valeur</h2>
<code>
    $oRegistry->set('articles', 10000);
    $oRegistry['commentaires'] = 200000;
</code>
<p>Contrôle des valeurs :</p>
<p>Articles : {{ articles }}</p>
<p>Commentaires : {{ commentaires }}</p>

<h2>Suppression d'une valeur</h2>
<code>
    $oRegistry->remove('commentaires'); 
    unset($oRegistry['commentaires']);
    $oRegistry->offsetUnset('commentaires');
    $oRegistry->__unset('commentaires');
</code>
<p>Commentaire existe ? {{ has_commentaires|default(0) }}</p>

<h2>Parcours PHP</h2>
<code>
    $sListePHP = '';
    foreach ($oRegistryPrenom as $sCle => $sValeur) {
        $sListePHP .= '&lt;p&gt;'. $sCle . ' : ' . $sValeur . '&lt;/p&gt;';
    }
</code>
<p>Affichage de la chaîne</p>
<p>{{ liste_php }}</p>

<h2>Parcours avec Volt</h2>
{% for cle,valeur in registry_volt %}
    <p>{{ cle }} : {{ valeur }}</p>
{% endfor%}

<h2>Serialisation</h2>
<code>
    $oRegistry->serialize();
</code>
<p>{{ serialisation_classique }}</p>

<h2>Déserialise</h2>
<code>   
    $oRegistrySimple->unserialize($sSerialisationClassique);
</code>
{% for cle,valeur in registry_simple %}
    {% if valeur is type('array') %}
        <p>{{ cle }} : {{ valeur|join(',') }}</p>
    {% else %}
        <p>{{ cle }} : {{ valeur }}</p>
    {% endif %}
{% endfor%}

<h2>Transformation</h2>
<h3>En tableau</h3>
<code>$oRegistry->toArray();</code>
<p><?php print_r($vers_tableau) ?></p>

<h3>En Json</h3>
<h4>Simple</h4>
<code>$oRegistry->toJson();</code>
<p>{{ vers_json }}</p>

<h4>Avec Paramètre</h4>
<code>$oRegistry->toJson(JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);</code>
<p>{{ vers_json_parametre }}</p>