<h1>Bases de données - Abstraction Layer</h1>
<h2>Insertion de données</h2>
<h3>Requête avec des paramètres avec des ?</h3>
<h4>Utilisateur crée :</h4>
<p>Nom : {{ nouvel_utilisateur.nom }} - Prénom : {{ nouvel_utilisateur.prenom }} - Email : {{ nouvel_utilisateur.email }} - Mot de Passe : {{ nouvel_utilisateur.mot_de_passe }}</p>

<h3>Requête avec des paramètres nommés</h3>
<h4>Utilisateur crée :</h4>
<p>Nom : {{ nouvel_utilisateur_nom_parametre.nom }} - Prénom : {{ nouvel_utilisateur_nom_parametre.prenom }} - Email : {{ nouvel_utilisateur_nom_parametre.email }} - Mot de Passe : {{ nouvel_utilisateur_nom_parametre.mot_de_passe }}</p>

<h3>Requête avec la fonction insert</h3>
<h4>Utilisateur crée :</h4>
<p>Nom : {{ nouvel_utilisateur_requete_dynamique.nom }} - Prénom : {{ nouvel_utilisateur_requete_dynamique.prenom }} - Email : {{ nouvel_utilisateur_requete_dynamique.email }} - Mot de Passe : {{ nouvel_utilisateur_requete_dynamique.mot_de_passe }}</p>


<h3>Requête avec la fonction insertAsDict en utilisant un tableau de donnée</h3>
<h4>Utilisateur crée :</h4>
<p>Nom : {{ nouvel_utilisateur_requete_dynamique_par_tableau.nom }} - Prénom : {{ nouvel_utilisateur_requete_dynamique_par_tableau.prenom }} - Email : {{ nouvel_utilisateur_requete_dynamique_par_tableau.email }} - Mot de Passe : {{ nouvel_utilisateur_requete_dynamique_par_tableau.mot_de_passe }}</p>