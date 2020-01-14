<h1>Bases de données - Abstraction Layer</h1>
<h2>Information sur la base de données</h2>
<h3>Liste des tables du schéma public</h3>
<ul>
    {% for table in tables %}
        <li>{{ table }}</li>
    {% endfor %}
</ul>
<h3>Est-ce que la table utilisateur existe ? {{ utilisateurs_existe|default(0) }}</h3>
<h3>Liste des colonnes de la table utilisateurs</h3>
{% for nom, informations in colonnes_informations %}
    <h4>Colonne {{ nom }}</h4>
    <ul>
        <li>
            {{ informations|join('</li><li>') }}
        </li>
    </ul>
{% endfor %}

<h3>Liste des index de la table utilisateurs</h3>
{% for nom, colonnes in index_informations %}
    <h4>Index {{ nom }}</h4>
    <h5>Liste de colonnes</h5>
    <ul>
        <li>
            {{ colonnes|join('</li><li>') }}
        </li>
    </ul>
{% endfor %}

<h3>Liste des clés étrangères de la table utilisateurs</h3>
{% for nom, colonnes in cle_etrangere_informations %}
    <h4>Clé étrangère : {{ nom }}</h4>
    <ul>
        <li>
            {{ colonnes|join('</li><li>') }}
        </li>
    </ul>
{% endfor %}

<h3>Liste des vues du schéma public</h3>
<ul>
    {% for vue in vues %}
        <li>{{ vue }}</li>
    {% endfor %}
</ul>
<h3>Est-ce que la vue utilisateurs_crypte existe ? {{ utilisateurs_crypte_existe|default(0) }}</h3>