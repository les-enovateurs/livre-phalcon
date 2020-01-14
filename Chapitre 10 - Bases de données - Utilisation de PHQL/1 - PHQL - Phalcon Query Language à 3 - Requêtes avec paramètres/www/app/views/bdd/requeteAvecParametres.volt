<h1>Bases de données - Utilisation de PHQL</h1>
<h2>Requête avec mot clé reservé par Phalcon</h2>
<p>Résulat en JSON : {{ utilisateurs_avec_mot_reserve|json_encode }}</p>
<h2>Requête avec des paramètres (prénom contient un a)</h2>
<ul>
    {% for utilisateur in utilisateurs_avec_parametres %}
        <li>{{ utilisateur.prenom }}</li>
    {% endfor %}
</ul>
<h2>Requête avec des paramètres et des types (limité à 3)</h2>
<ul>
    {% for utilisateur in utilisateurs_avec_parametres_et_types %}
        <li>{{ utilisateur.prenom }}</li>
    {% endfor %}
</ul>
<h2>Requête avec des paramètres et des types dans la requête (id > 3)</h2>
<ul>
    {% for utilisateur in utilisateurs_avec_parametres_et_types_ecrit %}
        <li>{{ utilisateur.prenom }}</li>
    {% endfor %}
</ul>
<h2>Requête avec des paramètres et des types tableau (contrainte avec une liste de nom)</h2>
<ul>
    {% for utilisateur in utilisateurs_avec_parametres_et_types_tableau %}
        <li>{{ utilisateur.prenom }}</li>
    {% endfor %}
</ul>