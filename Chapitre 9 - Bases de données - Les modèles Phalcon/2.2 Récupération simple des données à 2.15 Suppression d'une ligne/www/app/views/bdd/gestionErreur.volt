<h1>Bases de données - Les modèles Phalcon</h1>
<h2>Gestion des erreurs</h2>
<h3>Nouvelle utilisatrice avec une valeur manquante</h3>
<code>
    $oUtilisateur               = new Utilisateurs();
    $oUtilisateur->prenom       = 'Eloise';
    $oUtilisateur->email        = 'eloise.doe@les-enovateurs.com';
    $oUtilisateur->mot_de_passe = 'azerty';
</code>

{% if erreurs_sauvegarde is defined %}

<h4>Erreur lors de l'enregistrement : </h4>

{{ erreurs_sauvegarde }}

{% endif %}

<h3>Liste des deux dernières utilisatrices</h3>

<p>Résultat sous forme JSON {{ liste_utilisateur|json_encode }}</p>
