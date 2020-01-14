<h1>Intéraction avec les bases de données</h1>
<h2>Connexion à la base de données</h2>
<h3>Liste utilisateurs PostgreSql</h3>
<ul>
    {% for utilisateur in utilisateurs %}
        <li>{{ utilisateur.prenom }}</li>
    {% endfor %}
</ul>

<p>Il faut regarder le fichier phalcon.log pour connaître les performances SQL.</p>