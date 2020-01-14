<h1>Utilisations de conditions</h1>
<h2>Structure selon le cas ( Switch case )</h2>
<p>Voir le fichier app/views/index/index.volt</p><br />

{% set region_ville = 13 %}

{% switch region_ville %}
    {% case 13 %}
    {% case "paca" %}
        C'est la Provence
    {% break %}
    {% case 95 %}
        c'est l'Ile de France
        {% break %}
    {% default %}
        Région inconnue
{% endswitch %}