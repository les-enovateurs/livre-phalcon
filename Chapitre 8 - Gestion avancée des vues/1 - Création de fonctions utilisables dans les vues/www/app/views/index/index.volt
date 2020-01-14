<h1>Création de fonctions utilisables dans les vues</h1>
<h2>Ajout de fonctions provenant de PHP</h2>
<p>Voir le fichier app/config/services.php (le service view)</p><br />

{% for element in v_explode('|' , 'tomates|courgettes|aubergines') %}
    <p>{{ element }}</p>
{% endfor %}

<h2>Ajout d’une fonction personnalisée</h2>
{{ affiche_utilisateur("Jérémy", "PASTOURET") }}