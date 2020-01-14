<h1>Bases de données - Les modèles Phalcon</h1>
<h2>Requête avec les modèles</h2>
<h3>Liste</h3>

<h4>Tous les utilisateurs</h4>
<ul>
    {% for utilisateur in utilisateurs %}
        <li>{{ utilisateur.prenom }}</li>
    {% endfor %}
</ul>

<h4>Un seul utilisateur</h4>
<p>{{ premier_utilisateur.prenom }}</p>

<h3>Sélection de colonnes</h3>
<h4>Utilisateurs avec la Colonne id et nom</h4>
<p>Résultat sous forme JSON {{ utilisateurs_colonne|json_encode }}</p>

<h4>Premier utilisateur avec la Colonne id et nom</h4>
<p>Résultat sous forme JSON {{ utilisateur_colonne|json_encode }}</p>

<h3>Limitations</h3>
<h4>A deux lignes</h4>
{% for utilisateur in utilisateurs_conditions_limitation_2 %}
    <li>{{ utilisateur.prenom }}</li>
{% endfor %}
<h4>A quatre lignes avec un saut de deux lignes</h4>
{% for utilisateur in utilisateurs_conditions_limitation_4_saut_2 %}
    <li>{{ utilisateur.prenom }}</li>
{% endfor %}

<h3>Tri</h3>
<h4>Par mail en ordre décroissant</h4>
{% for utilisateur in utilisateurs_conditions_tri %}
    <li>{{ utilisateur.prenom }}</li>
{% endfor %}

<h3>Conditions</h3>
<h4>Fonction cadre</h4>
<ul>
        {% for utilisateur in utilisateurs_cadre %}
                <li>{{ utilisateur.prenom }}</li>
        {% endfor %}
</ul>

<h4>Le premier utilisateur cadre</h4>
<p>{{ premier_utilisateur_cadre.prenom }}</p>

<h3>Conditions avec paramètres</h3>
<h4>Paramètres simples - Liste utilisateurs responsable contenant dans le mail le terme graphivox</h4>
<ul>
        {% for utilisateur in utilisateurs_conditions %}
                <li>{{ utilisateur.prenom }}</li>
        {% endfor %}
</ul>

<h4>Même paramètre mais en récupérant le premier utilisateur</h4>
<p>{{ premier_utilisateur_conditions.prenom }}</p>

<h4>Paramètres avec le type - Liste utilisateurs responsable contenant dans le mail le terme graphivox</h4>
<ul>
        {% for utilisateur in utilisateurs_conditions_type %}
                <li>{{ utilisateur.prenom }}</li>
        {% endfor %}
</ul>

<h3>Groupement</h3>
<p>Nombre d'employés par fonction</p>
<ul>
    {% for utilisateur in utilisateurs_conditions_groupement %}
        <li>Fonction : {{ utilisateur.fonction }} - Nombre : {{ utilisateur.nombre_par_fonction }}</li>
    {% endfor %}
</ul>


<h3>Récupération d'informations</h3>
<h4>Requête de base</h4>
<ul>
    {% for utilisateur in utilisateurs_informations %}
        <li>{{ utilisateur.prenom }}</li>
    {% endfor %}
</ul>

<h4>Nombre d'utilisateurs présent dans la requête</h4>
<p>{{ nombre_utilisateurs_informations }}</p>

<h4>Changement du curseur, saut de deux lignes</h4>
<p>Correspond à cet utilisateur : {{ utilisateurs_information_courant.prenom }}</p>

<h4>Récupération du premier utilisateur</h4>
<p>{{ premier_utilisateur_information.prenom }}</p>

<h4>Récupération du dernier utilisateur</h4>
<p>{{ dernier_utilisateur_information.prenom }}</p>

<h3>Transformation du résultat de la requête</h3>
<h4>Parcours tableau</h4>
<code>
    utilisateur['prenom']
</code>
<ul>
    {% for utilisateur in utilisateurs_tableau %}
        <li>{{ utilisateur['prenom'] }}</li>
    {% endfor %}
</ul>
<h4>Parcours objet</h4>
<ul>
    {% for utilisateur in utilisateurs_objet %}
        <li>{{ utilisateur.prenom }} - <small><?php echo get_class($utilisateur); ?></small></li>
    {% endfor %}
</ul>
<h4>Parcours objet Utilisateur</h4>
<ul>
    {% for utilisateur in utilisateurs_objet_utilisateur %}
        <li>{{ utilisateur.prenom }}</li>
        <small>Accès à une fonction de la classe utilisateur (exemple) : {{ utilisateur.exemple() }}</small>
    {% endfor %}
</ul>

<h4>Paramètrage dans la reqûete, résultat sous forme de tableau</h4>
<code>
    utilisateur['prenom']
</code>
<ul>
    {% for utilisateur in utilisateurs_tableau_passage_requete %}
        <li>{{ utilisateur['prenom'] }}</li>
    {% endfor %}
</ul>