<h1>Bases de données - Les modèles Phalcon</h1>
<h2>Forcer la mise à jour d'une ligne</h2>
<h3>Utilisateur avant mise à jour</h3>
<p>Nom : {{ utilisateur_avant.nom }} - Prénom : {{ utilisateur_avant.prenom }} - Email : {{ utilisateur_avant.email }}</p>
<h3>Mise à jour</h3>
<code>
    $oUtilisateur->nom = 'PAUL_' . uniqid();

    $oUtilisateur->update();
</code>
<h3>Utilisateur après mise à jour</h3>
<p>Nom : {{ utilisateur_apres.nom }} - Prénom : {{ utilisateur_apres.prenom }} - Email : {{ utilisateur_apres.email }}</p>