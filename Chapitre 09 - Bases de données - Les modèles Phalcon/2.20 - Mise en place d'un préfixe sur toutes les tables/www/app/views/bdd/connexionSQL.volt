<h1>Bases de données - Les modèles Phalcon</h1>
<h2>Connexion à la base de données</h2>
<h3>Liste utilisateurs PostgreSql</h3>
<ul>
    {% for utilisateur in utilisateurs %}
        <li>{{ utilisateur.prenom }}</li>
    {% endfor %}
</ul>
Voir services.php