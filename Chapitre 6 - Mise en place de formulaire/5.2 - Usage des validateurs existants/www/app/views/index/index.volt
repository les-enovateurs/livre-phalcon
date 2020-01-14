<h1>Gestion des validateurs</h1>
<h2>Usage des validateurs existants</h2>
<p>Voir les fichiers app/forms/Chap6Form.php et app/controllers/IndexController.php</p><br />

{%  if erreurs is defined %}
    <div class="alert alert-danger">
        {{ erreurs }}
    </div>
{% endif %}

<form method="post" enctype="multipart/form-data">

    <h3>Validateur Alphanumérique</h3>
    <div class="form-group">
        {{ form.label("nom_utilisateur") }}
        {{ form.render("nom_utilisateur") }}
        <small class="form-text text-muted">Erreur à saisir : $*ù</small>
        <small class="form-text text-muted">Valeur correcte à saisir : inther08</small>
    </div>

    <h3>Validateur Alphabétique</h3>
    <div class="form-group">
        {{ form.label("nom") }}
        {{ form.render("nom") }}
        <small class="form-text text-muted">Erreur à saisir : 123</small>
        <small class="form-text text-muted">Valeur correcte à saisir : Sandrine</small>
    </div>

    <h3>Validateur Intervalle de valeur</h3>
    <div class="form-group">
        {{ form.label("pourcentage_avancement") }}
        {{ form.render("pourcentage_avancement") }}
        <small class="form-text text-muted">Erreur à saisir : 200</small>
        <small class="form-text text-muted">Valeur correcte à saisir : 40</small>
    </div>

    <div class="form-group">
        {{ form.label("nombre_de_gateaux") }}
        {{ form.render("nombre_de_gateaux") }}
        <small class="form-text text-muted">Erreur à saisir : 3</small>
        <small class="form-text text-muted">Valeur correcte à saisir : 10</small>
    </div>

    <h3>Validateur Personnalisé</h3>
    <div class="form-group">
        {{ form.label("nombre_de_part_par_gateaux") }}
        {{ form.render("nombre_de_part_par_gateaux") }}
        <small class="form-text text-muted">Erreur à saisir : 7</small>
        <small class="form-text text-muted">Valeur correcte à saisir : 2</small>
    </div>

    <div class="form-group">
        {{ form.label("mot_de_passe") }}
        {{ form.render("mot_de_passe") }}
        <small class="form-text text-muted">Erreur à saisir : azerty</small>
        <small class="form-text text-muted">Valeur correcte à saisir : azerty</small>
    </div>

    <h3>Validateur Confirmation de valeur</h3>
    <div class="form-group">
        {{ form.label("mot_de_passe_confirme") }}
        {{ form.render("mot_de_passe_confirme") }}
        <small class="form-text text-muted">Erreur à saisir : azerty123</small>
        <small class="form-text text-muted">Valeur correcte à saisir : azerty</small>
    </div>

    <h3>Validateur Numéro de carte de paiement</h3>
    <div class="form-group">
        {{ form.label("carte_de_credit") }}
        {{ form.render("carte_de_credit") }}
        <small class="form-text text-muted">Erreur à saisir : 12457423432</small>
        <small class="form-text text-muted">Valeur correcte à saisir : 5460041758897538</small>
    </div>

    <h3>Validateur Date</h3>
    <div class="form-group">
        {{ form.label("date_de_naissance") }}
        {{ form.render("date_de_naissance") }}
        <small class="form-text text-muted">Erreur à saisir : 03-21-19</small>
        <small class="form-text text-muted">Valeur correcte à saisir : 21-03-19</small>
    </div>

    <h3>Validateur Numérique</h3>
    <div class="form-group">
        {{ form.label("quantite_de_fruits") }}
        {{ form.render("quantite_de_fruits") }}
        <small class="form-text text-muted">Erreur à saisir : -123</small>
        <small class="form-text text-muted">Valeur correcte à saisir : 123</small>
    </div>

    <h3>Validateur Adresse e-mail</h3>
    <div class="form-group">
        {{ form.label("adresse_mail") }}
        {{ form.render("adresse_mail") }}
    </div>
    <small class="form-text text-muted">Erreur à saisir : test</small>
    <small class="form-text text-muted">Valeur correcte à saisir : jeremy.pastouret@les-enovateurs.com</small>

    <h3>Validateur Exclusion de valeur</h3>
    <div class="form-group">
        {{ form.label("reponse_qcm") }}
        {{ form.render("reponse_qcm") }}
    </div>
    <small class="form-text text-muted">Erreur à saisir : C</small>
    <small class="form-text text-muted">Valeur correcte à saisir : B</small>

    <h3>Validateur Fichier</h3>
    <div class="form-group">
        {{ form.label("photo_de_profil") }}
        {{ form.render("photo_de_profil") }}
        <small class="form-text text-muted">Erreur à saisir : importer un gros fichier texte et une image avec une grosse résolution</small>
        <small class="form-text text-muted">Valeur correcte à saisir : une image jpg de moins d'1Mo et d'une résolution inférieur à 800x600 et supérieur à 400x300</small>
    </div>

    <h3>Validateur Valeur identique</h3>
    <div class="form-group">
        {{ form.label("condition_general") }}
        {{ form.render("condition_general") }}
        <small class="form-text text-muted">Erreur à saisir : il ne faut pas cocher la case</small>
        <small class="form-text text-muted">Valeur correcte à saisir : il faut cocher la case</small>
    </div>

    <h3>Validateur Inclusion de valeur</h3>
    <div class="form-group">
        {{ form.label("taille_de_vetement") }}
        {{ form.render("taille_de_vetement") }}
        <small class="form-text text-muted">Erreur à saisir : M</small>
        <small class="form-text text-muted">Valeur correcte à saisir : L</small>
    </div>

    <h3>Validateur Valide numériquement et Non nulle</h3>
    <div class="form-group">
        {{ form.label("nombre_de_livre") }}
        {{ form.render("nombre_de_livre") }}
        <small class="form-text text-muted">Erreur à saisir : ?123 (il faut enlever le type number) ou ne rien mettre</small>
        <small class="form-text text-muted">Valeur correcte à saisir : 123</small>
    </div>

    <h3>Validateur Expression régulière</h3>
    <div class="form-group">
        {{ form.label("numero_de_telephone") }}
        {{ form.render("numero_de_telephone") }}
        <small class="form-text text-muted">Erreur à saisir : 12.1221.122.12</small>
        <small class="form-text text-muted">Valeur correcte à saisir : 04.09.43.12.43</small>
    </div>

    <h3>Validateur Nombre de caractère</h3>
    <div class="form-group">
        {{ form.label("reference_produit") }}
        {{ form.render("reference_produit") }}
        <small class="form-text text-muted">Erreur à saisir : 123231312312312 ou 3</small>
        <small class="form-text text-muted">Valeur correcte à saisir : A2A2</small>
    </div>

    <h3>Validateur Valeur unique</h3>
    <div class="form-group">
        {{ form.label("prenom") }}
        {{ form.render("prenom") }}
        <small class="form-text text-muted">Erreur à saisir : Louise</small>
        <small class="form-text text-muted">Valeur correcte à saisir : Paul</small>
    </div>

    <h3>Validateur URL</h3>
    <div class="form-group">
        {{ form.label("url_site_web") }}
        {{ form.render("url_site_web") }}
        <small class="form-text text-muted">Erreur à saisir : google</small>
        <small class="form-text text-muted">Valeur correcte à saisir : https://les-enovateurs.com</small>
    </div>


    {{ form.render('bouton_de_soumission') }}
</form>