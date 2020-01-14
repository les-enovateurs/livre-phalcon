<h1>Gestion des réponses</h1>
<p>Voir le fichier app/controllers/IndexController.php</p><br />

<a href="{{ url("page/404") }}">Page 404</a>
<br />
<a href="{{ url("contenu/json") }}">Données JSON</a>
<br />
<a href="{{ url("contenu/fichier") }}">Contenu Fichier</a>
<br />
<a href="{{ url("modification/entete") }}">Modification de l'entête</a>
<br />
<a href="{{ url("requete/cache/identifiant") }}">Mise en cache de la requête avec un identifiant</a>
<br />
<a href="{{ url("requete/cache/temps/expiration") }}">Mise en cache avec un temps d'expiration</a>
<br />
<a href="{{ url("requete/cache/date/expiration") }}">Mise en cache avec une date modifiée</a>
<br />
<a href="{{ url("requete/cache/date/precise/expiration") }}">Mise en cache avec une date d'expiration précise et fixe</a>
<br />
<a href="{{ url("requete/redirection/url/interne") }}">Redirection sur une URL interne</a>
<br />
<a href="{{ url("requete/redirection/nom/route") }}">Redirection sur le nom d'une route interne</a>
<br />
<a href="{{ url("requete/redirection/url/externe") }}">Redirection sur une URL externe</a>