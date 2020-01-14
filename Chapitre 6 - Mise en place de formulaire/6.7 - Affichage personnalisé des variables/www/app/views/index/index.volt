<h1>Gestion des formulaires</h1>
<h2>Affichage personnalisé des variables</h2>
<p>Voir le fichier app/forms/Chap6Form.php et surtout la fonction renderDecorated</p>

<form method="post" enctype="multipart/form-data">

    {{ form.renderDecorated("nom_utilisateur") }}

    {{ form.renderDecorated("nom") }}

    {{ form.renderDecorated("pourcentage_avancement") }}

    {{ form.renderDecorated("nombre_de_gateaux") }}

    {{ form.renderDecorated("nombre_de_part_par_gateaux") }}

    {{ form.renderDecorated("mot_de_passe") }}

    {{ form.renderDecorated("mot_de_passe_confirme") }}

    {{ form.renderDecorated("carte_de_credit") }}

    {{ form.renderDecorated("date_de_naissance") }}

    {{ form.renderDecorated("quantite_de_fruits") }}

    {{ form.renderDecorated("adresse_mail") }}

    {{ form.renderDecorated("reponse_qcm") }}

    {{ form.renderDecorated("photo_de_profil") }}

    {{ form.renderDecorated("condition_general") }}

    {{ form.renderDecorated("taille_de_vetement") }}

    {{ form.renderDecorated("nombre_de_livre") }}

    {{ form.renderDecorated("numero_de_telephone") }}

    {{ form.renderDecorated("reference_produit") }}

    {{ form.renderDecorated("url_site_web") }}

    {{ form.render('bouton_de_soumission') }}
</form>