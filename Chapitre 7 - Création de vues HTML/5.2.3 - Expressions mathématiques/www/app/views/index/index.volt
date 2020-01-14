<h1>Gestion des variables</h1>
<h2>Expressions mathématiques</h2>
<p>Voir le fichier app/views/index/index.volt</p><br />

{# Opération mathématique #}
{# Addition #}
<h2>Addition</h2>
<p>10 + 5 = {{ 10 + 5 }}</p>

<h3>Addition sur une variable</h3>
{% set nAddition = 10 %}
{% set nAddition += 5 %}
<p>{{ nAddition }}</p>

{# Soustraction #}
<h2>Soustraction</h2>
<p>8 - 5 = {{ 8 - 5 }}</p>

<h3>Soustraction sur une variable</h3>
{% set nSoustraction = 8 %}
{% set nSoustraction -= 5 %}
<p>{{ nSoustraction }}</p>

{# Multiplication #}
<h2>Multiplication</h2>
<p>8 x 3 = {{ 8 * 3 }}</p>

<h3>Multiplication sur une variable</h3>
{% set nMultiplication = 8 %}
{% set nMultiplication *= 3 %}
<p>{{ nMultiplication }}</p>

{# Division #}
<h2>Division</h2>
<p>13 / 3 = {{ 13 / 3 }}</p>

<h3>Division sur une variable</h3>
{% set nDivision = 13 %}
{% set nDivision /= 3 %}
<p>{{ nDivision }}</p>


{# Récupérer le modulo d'une division #}
<h2>Modulo</h2>
<p>16 % 3 = {{ 13 % 3 }}</p>