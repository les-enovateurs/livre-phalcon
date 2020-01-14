<h2>Gestion du cache</h2>
<h3>Stockage en cache avec la sauvegarde de l'expiration au bout de 3600 secondes</h3>
{% if utilisation_cache is true %}

    <p>Utilisation du cache</p>

{% else %}

    <p>Récupération de la liste des utilisateurs et mise en cache.</p>
    <p>Pour voir le contenu en cache, il faut recharger la page.</p>

{% endif %}

{% for utilisateur in utilisateurs %}

    <p>{{ utilisateur.prenom ~ " " ~ utilisateur.nom }}</p>

{% endfor %}
