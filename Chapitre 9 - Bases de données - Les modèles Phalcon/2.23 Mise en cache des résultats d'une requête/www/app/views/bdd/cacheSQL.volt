<h1>Bases de données - Les modèles Phalcon</h1>
<h2>Requête en cache</h2>
<h3>Liste utilisateurs PostgreSql sans cache</h3>
<p>Temps en milisecondes {{ temps }}</p>
<ul>
    {% for utilisateur in utilisateurs %}
        <li>{{ utilisateur.prenom }}</li>
    {% endfor %}
</ul>

<h2>Pour que le cache marche, il faut avoir ouvert au moins une fois la page</h2>

<h3>Liste utilisateurs PostgreSql avec cache</h3>
<p>Temps en milisecondes {{ temps_cache }}</p>
<ul>
    {% for utilisateur in utilisateurs_cache %}
        <li>{{ utilisateur.prenom }}</li>
    {% endfor %}
</ul>

<h3>Liste utilisateurs PostgreSql avec cache de 4 heures</h3>
<p>Temps en milisecondes {{ temps_cache_4_heures }}</p>
<ul>
        {% for utilisateur in utilisateurs_cache_4_heures %}
                <li>{{ utilisateur.prenom }}</li>
        {% endfor %}
</ul>

<h3>Liste utilisateurs PostgreSql avec cache simple</h3>
<p>Temps en milisecondes {{ temps_cache_simple }}</p>
<ul>
        {% for utilisateur in utilisateurs_cache_simple %}
                <li>{{ utilisateur.prenom }}</li>
        {% endfor %}
</ul>