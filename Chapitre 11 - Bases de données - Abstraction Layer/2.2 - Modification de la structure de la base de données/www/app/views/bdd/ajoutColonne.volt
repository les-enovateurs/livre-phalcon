<h1>Bases de données - Abstraction Layer</h1>
<h2>Ajout d'une colonne</h2>
<h3>Liste des colonnes de la table utilisateurs</h3>
{% for nom, informations in colonnes_informations %}
        <h4>Colonne {{ nom }}</h4>
        <ul>
                <li>
                        {{ informations|join('</li><li>') }}
                </li>
        </ul>
{% endfor %}
