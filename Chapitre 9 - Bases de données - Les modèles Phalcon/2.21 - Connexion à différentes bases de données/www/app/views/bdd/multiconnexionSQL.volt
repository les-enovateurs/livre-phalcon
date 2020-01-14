<h1>Bases de données - Les modèles Phalcon</h1>
<h2>Connexion à la base de données</h2>
<h3>Liste utilisateurs PostgreSql</h3>
<ul>
    {% for utilisateur in utilisateurs %}
        <li>{{ utilisateur.prenom }}</li>
    {% endfor %}
</ul>
<h3>Liste villes MySQL</h3>
<ul>
    {% for ville in villes %}
        <li>{{ ville.nom }}</li>
    {% endfor %}
</ul>

Il faut regarder la fonction initialize de la classe utilisateur et de ville.