<h1>Bases de données - Les modèles Phalcon</h1>
<h2>Liaison entre les tables de la base de données</h2>

<h3>Début du parcours sur l'Utilisateur</h3>
    <h4>Récupération du premier Utilisateur</h4>
        <p>Nom : {{ utilisateur.nom }} - Prenom : {{ utilisateur.prenom }} - Email : {{ utilisateur.email }}</p>

    <h4>Entreprise de l'utilisateur ci-dessus</h4>
        <p>Nom : {{ utilisateur_entreprise.nom }}</p>

    <h4>Informations légales de l'entreprise ci-dessus</h4>
        <p>Siret : {{ entreprise_informations_legales.siret }} - Nombre d'employés : {{ entreprise_informations_legales.nombre_employes }}</p>

    <h4>Produits acheté par l'utilisateur ci-dessus</h4>
        {% for utilisateur_achat_produit in utilisateur_achat_produits %}
            <p>Nom : {{ utilisateur_achat_produit.nom }} - Prix : {{ utilisateur_achat_produit.prix }}</p>
        {% endfor %}

<h3>Début du parcours sur une ligne d'informations légales</h3>
    <h4>Récupération de la dernière ligne d'informations légales</h4>
        <p>Siret : {{ informations_legales.siret }} - Nombre d'employés : {{ informations_legales.nombre_employes }}</p>

    <h4>Retrouver l'entreprise associé aux informations ci-dessus</h4>
        <p>Nom : {{ informations_legales_entreprise.nom }}</p>

<h3>Début du parcours sur un produit</h3>
    <h4>Produit choisi</h4>
        <p>Nom : {{ produit.nom }} - Prix : {{ produit.prix }}</p>

    <h4>Liste des utilisateurs ayant achetés le produit</h4>
        {% for produit_utilisateur in produit_utilisateurs %}
            <p>Nom : {{ produit_utilisateur.nom }} - Prenom : {{ produit_utilisateur.prenom }} - Email : {{ produit_utilisateur.email }}</p>
        {% endfor %}

<h3>Début du parcours sur une entreprise</h3>
    <h4>L'entreprise</h4>
        <p>Nom : {{ entreprise.nom }}</p>

    <h4>Listes des utilisateurs de l'entreprise</h4>
        {% for entreprise_utilisateur in entreprise_utilisateurs %}
            <p>Nom : {{ entreprise_utilisateur.nom }} - Prenom : {{ entreprise_utilisateur.prenom }} - Email : {{ entreprise_utilisateur.email }}</p>
        {% endfor %}

    <h4>Nombre d'utilisateur de l'entreprise</h4>
        <p>{{ nombre_utilisateurs }}</p>

    <h4>Listes des utilisateurs de l'entreprise dont le prénom contient un a</h4>
    {% for entreprise_utilisateur_avec_un_a in entreprise_utilisateurs_avec_un_a %}
        <p>Nom : {{ entreprise_utilisateur_avec_un_a.nom }} - Prenom : {{ entreprise_utilisateur_avec_un_a.prenom }} - Email : {{ entreprise_utilisateur_avec_un_a.email }}</p>
    {% endfor %}

    <h4>Listes des utilisateurs de l'entreprise dont la fonction est cadre</h4>
    {% for entreprise_utilisateur_cadre in entreprise_utilisateurs_cadre %}
        <p>Nom : {{ entreprise_utilisateur_cadre.nom }} - Prenom : {{ entreprise_utilisateur_cadre.prenom }} - Email : {{ entreprise_utilisateur_cadre.email }}</p>
    {% endfor %}

    <h4>Listes des utilisateurs de l'entreprise dont la fonction est CTO</h4>
    {% for entreprise_utilisateur_cto in entreprise_utilisateurs_cto %}
        <p>Nom : {{ entreprise_utilisateur_cto.nom }} - Prenom : {{ entreprise_utilisateur_cto.prenom }} - Email : {{ entreprise_utilisateur_cto.email }}</p>
    {% endfor %}

    <h4>Listes des utilisateurs de l'entreprise dont les fonctions ne sont pas CTO ni cadre</h4>
    {% for entreprise_utilisateur_autres in entreprise_utilisateurs_autres %}
        <p>Nom : {{ entreprise_utilisateur_autres.nom }} - Prenom : {{ entreprise_utilisateur_autres.prenom }} - Email : {{ entreprise_utilisateur_autres.email }}</p>
    {% endfor %}

<h3>Clé étrangère virtuelle</h3>
<p>Erreur : {{ erreurs_sauvegarde }}</p>


