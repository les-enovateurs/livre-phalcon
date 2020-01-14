<h1>Bases de données - Les modèles Phalcon</h1>
<h2>Comportement spécifique lors de l'ajout/modification/suppression d'élément(s)</h2>
<h3>Liste utilisateurs de base PostgreSql</h3>
<ul>
    {% for utilisateur in utilisateurs %}
        <li>
            {% for propriete, valeur in utilisateur %}
                {{ propriete ~ ": "~valeur~", " }}
            {% endfor %}
        </li>
    {% endfor %}
</ul>

<h3>Utilisateur crée sans precision de la date</h3>
<ul>
    {% for utilisateur in utilisateurs_ajoutes %}
        <li>
            {% for propriete, valeur in utilisateur %}
                {{ propriete ~ ": "~valeur~", " }}
            {% endfor %}
        </li>
    {% endfor %}
</ul>

<h3>Utilisateur modifié</h3>
<ul>
    {% for utilisateur in utilisateurs_modifies %}
        <li>
            {% for propriete, valeur in utilisateur %}
                {{ propriete ~ ": "~valeur~", " }}
            {% endfor %}
        </li>
    {% endfor %}
</ul>

<h3>Utilisateur supprimé</h3>
<ul>
    {% for utilisateur in utilisateurs_supprimes %}
        <li>
            {% for propriete, valeur in utilisateur %}
                {{ propriete ~ ": "~valeur~", " }}
            {% endfor %}
        </li>
    {% endfor %}
</ul>