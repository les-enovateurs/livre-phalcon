<h1>Bases de données - Abstraction Layer</h1>
<h2>Mise à jour de données</h2>
<h3>Utilisateur de départ</h3>
<p>ID : {{ utilisateur_reference.id }} - Nom : {{ utilisateur_reference.nom }} - Prénom : {{ utilisateur_reference.prenom }} - Email : {{ utilisateur_reference.email }} - Mot de Passe : {{ utilisateur_reference.mot_de_passe }}</p>

<h3>Requête avec des paramètres ?</h3>
<h4>Utilisateur mis à jour :</h4>
<p>ID : {{ utilisateur_maj.id }} Nom : {{ utilisateur_maj.nom }} - Prénom : {{ utilisateur_maj.prenom }} - Email : {{ utilisateur_maj.email }} - Mot de Passe : {{ utilisateur_maj.mot_de_passe }}</p>

<h3>Requête avec des paramètres nommés</h3>
<h4>Utilisateur mis à jour :</h4>
<p>ID : {{ maj_utilisateur_nom_parametre.id }} Nom : {{ maj_utilisateur_nom_parametre.nom }} - Prénom : {{ maj_utilisateur_nom_parametre.prenom }} - Email : {{ maj_utilisateur_nom_parametre.email }} - Mot de Passe : {{ maj_utilisateur_nom_parametre.mot_de_passe }}</p>

<h3>Requête avec la fonction update</h3>
<h4>Utilisateur mis à jour :</h4>
<p>ID : {{ maj_utilisateur_simple.id }} Nom : {{ maj_utilisateur_simple.nom }} - Prénom : {{ maj_utilisateur_simple.prenom }} - Email : {{ maj_utilisateur_simple.email }} - Mot de Passe : {{ maj_utilisateur_simple.mot_de_passe }}</p>

<h3>Requête avec la fonction update avec une condition dynamique</h3>
<h4>Utilisateur mis à jour :</h4>
<p>ID : {{ maj_utilisateur_simple_condition_param.id }} Nom : {{ maj_utilisateur_simple_condition_param.nom }} - Prénom : {{ maj_utilisateur_simple_condition_param.prenom }} - Email : {{ maj_utilisateur_simple_condition_param.email }} - Mot de Passe : {{ maj_utilisateur_simple_condition_param.mot_de_passe }}</p>

<h3>Requête avec la fonction updateAsDict en utilisant un tableau de données</h3>
<h4>Utilisateur mis à jour :</h4>
<p>ID : {{ maj_utilisateur_tableau.id }} Nom : {{ maj_utilisateur_tableau.nom }} - Prénom : {{ maj_utilisateur_tableau.prenom }} - Email : {{ maj_utilisateur_tableau.email }} - Mot de Passe : {{ maj_utilisateur_tableau.mot_de_passe }}</p>

<h3>Requête avec la fonction updateAsDict en utilisant un tableau de données avec une condition dynamique</h3>
<h4>Utilisateur mis à jour :</h4>
<p>ID : {{ maj_utilisateur_tableau_condition_param.id }} Nom : {{ maj_utilisateur_tableau_condition_param.nom }} - Prénom : {{ maj_utilisateur_tableau_condition_param.prenom }} - Email : {{ maj_utilisateur_tableau_condition_param.email }} - Mot de Passe : {{ maj_utilisateur_tableau_condition_param.mot_de_passe }}</p>