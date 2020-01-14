<h2>Gestion du cache</h2>
<h3>Suppression de cache</h3>

{% if cache_supprime is true %}
    <p>Le cache a été trouvé et supprimé</p>
{% else %}
    <p>Le cache n'a pas été trouvé</p>
    <p>Pour recréer le cache, <a href="{{ url("/") }}">retour à la page d'accueil</a></p>
{% endif %}
