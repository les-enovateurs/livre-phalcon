<h1>Utilisations de conditions</h1>
<h2>Opérateurs de comparaisons et de logiques</h2>
<p>Voir le fichier app/views/index/index.volt</p><br />

{% set systeme = "android" %}
{% set version = 7 %}

{% if("windows" == systeme and 7 == version) %}
    <p>C'est un système Windows 7</p>
{% elseif("ubuntu" == systeme or "debian" == systeme) %}
    <p>C'est un noyau Linux</p>
{% elseif(not systeme) %}
    <p>Aucun système</p>
{% elseif systeme is "android" %}
    <p>C'est un système android</p>
{% elseif systeme is not "ios" %}
    <p>Ce n'est pas un système ios</p>
{% else %}
    <p>C'est un système inconnu</p>
{% endif %}