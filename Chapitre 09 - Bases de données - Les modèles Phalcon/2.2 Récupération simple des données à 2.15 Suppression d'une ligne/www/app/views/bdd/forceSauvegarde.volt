<h1>Bases de données - Les modèles Phalcon</h1>
<h2>Forcer l'insertion d'une nouvelle ligne</h2>
<code>
    $oUtilisateurTableau->assign(
        [
            'prenom'       => 'Catherine',
            'email'        => 'catherine.doe'.uniqid().'@les-enovateurs.com',
            'mot_de_passe' => 'azerty',
            'fonction'     => 'Responsable'
        ]
    );

    $oUtilisateurTableau->create();
</code>

<h3>Liste des deux dernières utilisatrices</h3>

<ul>
    {% for utilisateur in liste_utilisateur %}
        <li>Prénom : {{ utilisateur.prenom }} - Email : {{ utilisateur.email }}</li>
    {% endfor %}
</ul>
