<div class="page-header">
    <h1>Bonjour {{ utilisateur.prenom }} {{ utilisateur.nom }}</h1>
    <h2>Liste des cours enseignés</h2>
    <ul>
        {% for cour in cours %}
            <li>Nom : {{ cour.nom }} - Description : {{ cour.description }}</li>
        {% else %}
            <li>Aucun cours pour le moment</li>
        {% endfor %}
    </ul>
</div>