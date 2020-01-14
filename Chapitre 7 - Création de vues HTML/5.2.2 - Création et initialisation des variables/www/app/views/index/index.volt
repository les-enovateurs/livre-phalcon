<h1>Gestion des variables</h1>
<h2>Création et initialisation des variables</h2>
<p>Voir le fichier app/views/index/index.volt</p>

{# Un premier commentaire #}

{# Création et assignation de variable #}

{# Type : Chaîne de caractères #}
{% set sPrenom = 'Virginia' %}
{% set sPrenom = "Virginia" %}

{# Type : Nombre #}
{% set nIdentifiant = 10 %}

{# Type : Décimal #}
{% set nSolde = 34.98 %}

{# Type : Booléen avec la valeur Vrai #}
{% set bCompteVerifier = true %}

{# Type : Booléen avec la valeur Faux #}
{% set bCompteExpirer = false %}

{# Type : Valeur null #}
{% set aPanier = null %}

{# Type : Tableau #}
{% set aTableauValeur = [-1000, 'Windows', 'Linux'] %}
{% set aTableauValeurAlternative = {-1000, 'Windows', 'Linux'} %}

{# Type : Tableau associatif #}
{% set aVoiture = ['portes': 4, 'coffre': 1, 'marque': 'clio 3']  %}
{% set aVoiture = {'portes': 4, 'coffre': 1, 'marque': 'clio 3'}  %}

{# Type : Tableau de tableau #}
{% set aListeFruit = [ [ 'clémentine', 'orange' ], [ 'framboise', 'faire' ] ]  %}
{% set aListeFruit = { { 'clémentine', 'orange' }, { 'framboise', 'faire' } }  %}

{# Type : Tableau de tableau associatif #}
{% set aListeVoiture = [ [ 'marque' : 'clio', 'version' : 3 ], [ 'marque' : 'clio', 'version' : 4 ] ]  %}
{% set aListeVoiture = { { 'marque' : 'clio', 'version' : 3 }, { 'marque' : 'clio', 'version' : 4 } }  %}

{# Type : Tableau avec comme valeur un intervalle de nombre #}
{% set aIntervalleNombre = 1..14  %}

{# Type : Tableau avec comme valeur un intervalle de lettre #}
{% set aIntervalleLettre = 'a'..'j'  %}

{# Création et assignation multiple de variables #}
{% set aListeFruit = [ [ 'clémentine', 'orange' ], [ 'framboise', 'faire' ] ], aNouveauxNombres = 1..10, nNouveauIdentifiant = 10 %}
