<h1>Désactivation du cryptage des cookies</h1>
<p>Voir le fichier app/controllers/IndexController.php</p> <br />

{% if nom_utilisateur is empty or nom_utilisateur == "" %}
    <p>Vous n'êtes pas connecté.</p>
{% else %}
    <p>Vous êtes connecté sous le nom de {{ nom_utilisateur }}.</p>
{% endif %}

<a href="{{ url("connexion") }}">Connexion avec un cookie non-crypté</a>