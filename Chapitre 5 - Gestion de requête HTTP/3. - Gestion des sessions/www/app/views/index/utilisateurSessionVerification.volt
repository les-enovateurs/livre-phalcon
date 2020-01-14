<h2>Gestion des sessions classiques</h2>
<h3>Vérification de la valeur en session</h3>

{% if donnee_session is true %}
    <p>Les données sont bien présentes en session.</p>
    <p>Utilisateur_id : {{ utilisateur_id }}</p>
    <p>Utilisateur_prenom : {{ utilisateur_prenom }}</p>
{% else %}
    <p>Il n'y a pas l'intégralité des données en session</p>
{% endif %}

<p>Pour supprimer les données présentes, <a href="{{ url("/") }}">retournez sur la page d'accueil</a></p>