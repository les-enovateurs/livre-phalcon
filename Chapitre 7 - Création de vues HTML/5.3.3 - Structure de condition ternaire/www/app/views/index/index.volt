<h1>Utilisations de conditions</h1>
<h2>Structure de condition ternaire</h2>
<p>Voir le fichier app/views/index/index.volt</p><br />

{% set prix = 200 %}

<p>{{ prix > 100 ? "C'est cher" : "C'est peu couteux" }}</p>