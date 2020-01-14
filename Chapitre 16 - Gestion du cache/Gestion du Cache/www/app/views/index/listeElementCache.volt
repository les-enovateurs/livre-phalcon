<h2>Gestion du cache</h2>
<h3>Liste des éléments en cache</h3>

<p>Liste des clés : <br />- {{ liste_cle_cache|join('<br /> - ') }}</p>
<p>Données présent :</p>

{% for cle, donnee_cache in donnees_cache %}
    <h4>Clé : {{ cle }}</h4>
    {% for utilisateur in donnee_cache %}
        <p>{{ utilisateur.prenom ~" "~ utilisateur.nom }}</p>
    {% endfor %}
{% endfor %}