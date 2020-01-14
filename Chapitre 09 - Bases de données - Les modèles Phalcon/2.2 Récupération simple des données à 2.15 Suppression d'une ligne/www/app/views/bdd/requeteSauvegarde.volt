<h1>Bases de données - Les modèles Phalcon</h1>
<h2>Requête d'ajout d'une nouvelle utilisatrice</h2>
<h3>Méthode classique</h3>
<code>
    $oUtilisateur               = new Utilisateurs();
    $oUtilisateur->prenom       = 'Eloise';
    $oUtilisateur->email        = 'eloise.doe@les-enovateurs.com';
    $oUtilisateur->mot_de_passe = 'azerty';
    $oUtilisateur->fonction     = 'cadre';
</code>

<h3>Sauvegarde par tableau</h3>
<code>
    $oUtilisateur->assign(
        [
            'prenom'       => 'Olivia',
            'email'        => 'olivia.doe_'.uniqid().'@les-enovateurs.com',
            'mot_de_passe' => 'azerty',
            'fonction'     => 'DPO'
        ]
    );

    $oUtilisateur->save();  
</code>

<h3>Liste des deux dernières utilisatrices</h3>

<ul>
    {% for utilisateur in liste_utilisateur %}
        <li>Prénom : {{ utilisateur.prenom }} - Email : {{ utilisateur.email }}</li>
    {% endfor %}
</ul>
