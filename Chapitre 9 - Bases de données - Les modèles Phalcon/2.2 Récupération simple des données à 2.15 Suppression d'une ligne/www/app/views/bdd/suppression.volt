<h1>Bases de données - Les modèles Phalcon</h1>
<h2>Suppression d'un utilisateur</h2>
<h3>Liste des derniers utilisateurs avant suppression</h3>
<ul>
    {% for utilisateur in liste_utilisateur_avant_suppression %}
        <li>ID : {{ utilisateur.id }} - Prénom : {{ utilisateur.prenom }} - Email : {{ utilisateur.email }}</li>
    {% endfor %}
</ul>
<h3>Suppression du dernier utilisateur - ID : {{ utilisateur_supprime.id }} - Email : {{ utilisateur_supprime.email }}</h3>
<h3>Liste des derniers utilisateurs après suppression</h3>
<ul>
    {% for utilisateur in liste_utilisateur_apres_suppression %}
        <li>ID : {{ utilisateur.id }} - Prénom : {{ utilisateur.prenom }} - Email : {{ utilisateur.email }}</li>
    {% endfor %}
</ul>