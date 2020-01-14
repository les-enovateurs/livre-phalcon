<h1>Bases de données - Abstraction Layer</h1>
<h2>Suppression d'une table</h2>
<h3>Liste des tables présent avant la suppression</h3>
<ul>
        {% for nom in liste_table_avant %}
                <li>
                        {{ nom }}
                </li>
        {% endfor %}
</ul>
<h3>Liste des tables présent après la suppression</h3>
<ul>
        {% for nom in liste_table_apres %}
                <li>
                        {{ nom }}
                </li>
        {% endfor %}
</ul>