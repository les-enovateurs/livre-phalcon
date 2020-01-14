<h1>Bases de données - Abstraction Layer</h1>
<h2>Suppression de données</h2>
<h3>Liste d'utilisateur de référence</h3>
{% for utilisateur in ref_utilisateur  %}
    <p>ID : {{ utilisateur.id }} - Nom : {{ utilisateur.nom }} - Prénom : {{ utilisateur.prenom }} - Email : {{ utilisateur.email }} - Mot de Passe : {{ utilisateur.mot_de_passe }}</p>
{% endfor %}

<h3>Requête avec des paramètres ?</h3>
<h3>Liste d'utilisateur</h3>
{% for utilisateur in utilisateur_liste_apres_supprimer  %}
    <p>ID : {{ utilisateur.id }} - Nom : {{ utilisateur.nom }} - Prénom : {{ utilisateur.prenom }} - Email : {{ utilisateur.email }} - Mot de Passe : {{ utilisateur.mot_de_passe }}</p>
{% endfor %}

<h3>Requête avec des paramètres nommés</h3>
<h3>Liste d'utilisateur</h3>
{% for utilisateur in utilisateur_liste_apres_supprimer_nom_param  %}
    <p>ID : {{ utilisateur.id }} - Nom : {{ utilisateur.nom }} - Prénom : {{ utilisateur.prenom }} - Email : {{ utilisateur.email }} - Mot de Passe : {{ utilisateur.mot_de_passe }}</p>
{% endfor %}

<h3>Requête avec la fonction delete</h3>
<h3>Liste d'utilisateur</h3>
{% for utilisateur in utilisateur_liste_apres_supprimer_avec_fonction  %}
    <p>ID : {{ utilisateur.id }} - Nom : {{ utilisateur.nom }} - Prénom : {{ utilisateur.prenom }} - Email : {{ utilisateur.email }} - Mot de Passe : {{ utilisateur.mot_de_passe }}</p>
{% endfor %}