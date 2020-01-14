<h1>Bases de données - Utilisation de PHQL</h1>
<h2>Requête en PHQL et avec cache</h2>
<h3>Liste tous les utilisateurs</h3>
<p>Temps en milisecondes {{ temps_cache_phql }}</p>
<ul>
    {% for utilisateur in utilisateurs_phql %}
        <li>{{ utilisateur.prenom }}</li>
    {% endfor %}
</ul>

<h3>Recherche le ou les utilisateur(s) Jérémy</h3>
<p>Temps en milisecondes {{ temps_cache_phql_avec_condition }}</p>
<ul>
    {% for utilisateur in utilisateur_phql_avec_condition %}
        <li>{{ utilisateur.prenom }}</li>
    {% endfor %}
</ul>

<h2>Test du cache</h2>
<p>Utilisateur supprimé : {{ utilisateur_supprime.prenom }}</p>
<small>Il faut rafraichir la page pour constater la suppression sur la requête sans cache et voir l'utilisateur sur les requêtes en cache.</small>