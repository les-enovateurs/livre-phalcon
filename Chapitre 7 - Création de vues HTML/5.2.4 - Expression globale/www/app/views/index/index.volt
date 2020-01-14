<h1>Gestion des variables</h1>
<h2>Expression globale</h2>
<p>Voir le fichier app/views/index/index.volt</p><br />

<h3>Concaténation</h3>

<h4>Simple</h4>
<p>{{ "Il y a " ~ 10 ~ " fruits." }}</p>

<h4>Avec variable</h4>
{% set nombre_pommes = 5 %}
<p>{{ "Il y a " ~ nombre_pommes ~ " pommes." }}</p>

<h4>Avec uniquement des variables</h4>
{% set variete = "Pommes gold " %}
<p>{{ variete ~ nombre_pommes }}</p>