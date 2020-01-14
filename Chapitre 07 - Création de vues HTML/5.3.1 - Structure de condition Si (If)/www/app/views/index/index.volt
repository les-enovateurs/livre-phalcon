<h1>Utilisations de conditions</h1>
<h2>Structure de condition Si ( If )</h2>
<p>Voir le fichier app/views/index/index.volt</p><br />

{% set systeme = "linux" %}

{% if("windows" == systeme) %}
    <p>C'est un système Windows</p>
{% elseif("linux" == systeme) %}
    <p>C'est un système Linux</p>
{% else %}
    <p>C'est un système inconnu</p>
{% endif %}