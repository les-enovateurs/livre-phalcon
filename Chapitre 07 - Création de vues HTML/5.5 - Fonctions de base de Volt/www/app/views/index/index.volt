<h1>Fonctions de base de Volt</h1>
<p>Voir le fichier app/views/index/index.volt</p><br />

<h2>Fonctions pour des nombres</h2>
<h5>Filtre abs</h5>
<p>{{ (-10)|abs }}</p>

<h2>Fonctions pour des chaînes de caractères</h2>
<h5>Filtre capitalize</h5>
<p>{{ 'phalcon est génial'|capitalize }}</p>

<h5>Filtre lower</h5>
<p>{{ 'TEXTE MajuScule'|lower }}</p>

<h5>Filtre upper</h5>
<p>{{ 'terme en majuscule'|upper }}</p>

<h5>Filtre e - Transformation de balise html en texte pure</h5>
<p>{{ '<h1>Titre</h1>'|e }}</p>

<h5>Filtre escape - Transformation de balise html en texte pure</h5>
<p>{{ '<h1>Titre escape</h1>'|escape }}</p>

<h5>Filtre escape_attr - ajout d'une propriété dans le code HTML (il faut inspecter le code)</h5>
<p data-nom='{{ "l'ile de Phalcon"|escape_attr }}'>Un objet</p>

<h5>Filtre escape_css - Il faut inspecter le code</h5>
<p style="font-size:{{ '"><script>alert("injection");</script><p style="'|escape_css }}">injection bloquée</p>

<h5>Filtre escape_js - Il faut inspecter le code</h5>
<script>
	var nom = '{{ "'; alert('injection'); var test = '"|escape_js }}';
</script>

<br />

<h5>Filtre format</h5>
<p>{{ 'Il y a %s fruit(s)'|format(10) }}</p>

<h5>Filtre nl2br</h5>
<p>{{ 'retour
	a
	la
	ligne'|nl2br }}</p>

<h5>Filtre stripslashes</h5>
<?php $sChaineSlash = "l\'arbre" ?>
<p>{{ sChaineSlash|stripslashes }}</p>

<h5>Filtre striptags</h5>
{{ '<!-- commentaire supprimé -->
<h1><?php echo variable; ?>Test<h1>'|striptags }}

<h5>Filtre left_trim</h5>
<p>|{{ '    espaces '|left_trim }}|</p>

<h5>Filtre trim</h5>
<p>|{{ '  espace complet  '|trim }}|</p>

<h5>Filtre rtrim</h5>
<p>|{{ '  supression   '|right_trim }}|</p>

<h5>Filtre length</h5>
<p>Texte : {{ 'taille'|length }}</p>
<p>Tableau : {{ ['taille']|length }}</p>
<p>Objet : {{ {'13140':'Miramas'}|length }}</p>

<h5>Filtre url_encode</h5>
<p>{{ 'téléchargement/la liste des dossiers.pdf'|url_encode }}</p>

<h5>Filtre convert_encoding</h5>
<p>{{ 'écrire en utf-8'|convert_encoding('utf8','iso-8859-1') }}</p>

<h2>Fonctions pour des tableaux</h2>
<h5>Filtre json_encode</h5>
<p>{{ [[ 'nom':'pommes', 'quantite' : 10 ], [ 'nom':'orange', 'quantite' : 20 ]]|json_encode }}</p>

<h5>Filtre json_decode</h5>
{% set element_decode = '[{"nom":"pommes","quantite":10},{"nom":"orange","quantite":20}]'|json_decode %}
<?php print_r($element_decode); ?>
<br /><br />

<h5>Filtre join</h5>
<p>{{ [ 'framework', 'phalcon', 'php' ]|join(', ') }}</p>

<h5>Filtre keys</h5>
<p>{% set indice_tableau = ['75000' : 'Paris', '69000' : 'Lyon' ]|keys %}</p>
<?php print_r($indice_tableau); ?>
<br /><br />

<h5>Filtre sort</h5>
{% set tri_tableau = ['d' : 'Arles', 'e' : 'Lyon' , 'c' : 'Avignon' ]|sort %}
{# Pour afficher l’élément #}
<?php print_r($tri_tableau); ?>

<h2>Fonctions pour tout type de variable</h2>
<h5>Filtre default</h5>
<p>{{ variable_vide|default('ma valeur par defaut') }}</p>