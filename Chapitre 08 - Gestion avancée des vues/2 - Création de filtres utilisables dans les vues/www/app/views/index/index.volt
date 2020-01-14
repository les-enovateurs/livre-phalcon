<h1>Création de filtres utilisables dans les vues</h1>
<h2>Ajout de filtre provenant d'une fonction PHP</h2>
<p>Voir le fichier app/config/services.php (le service view)</p><br />

<p>{{ "mettre la première lettre en majuscule"|capitalise }}</p>

<h2>Ajout d’un filtre personnalisé</h2>
{{ "champs requis avec une etoile"|ajout_etoile_requis }}