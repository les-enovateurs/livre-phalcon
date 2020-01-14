<h2>Gestion des sessions classiques</h2>
<h3>Suppression d'un élément en session</h3>

{% if session_supprime is true %}
    <p>La donnée en session a été trouvé et supprimé</p>
    <p>Pour recréer la donnée, <a href="{{ url("/") }}">retournez sur la page d'accueil</a></p>
{% else %}
    <p>La donnée en session n'a pas été trouvé</p>
    <p>Pour recréer la donnée, <a href="{{ url("/") }}">retournez sur la page d'accueil</a></p>
{% endif %}
