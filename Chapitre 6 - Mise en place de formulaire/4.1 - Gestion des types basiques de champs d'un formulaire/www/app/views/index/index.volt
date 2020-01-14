<h1>Gestion des types de champs d'un formulaire</h1>
<h2>Types basiques</h2>
<p>Voir le fichier app/forms/Chap6Form.php</p><br />

<form method="post">
    <div class="form-group">
        {{ form.label("nom") }}
        {{ form.render("nom") }}
    </div>

    <div class="form-group">
        {{ form.label("mot_de_passe") }}
        {{ form.render("mot_de_passe") }}
    </div>

    <div class="form-group">
        {{ form.label("liste_pays") }}
        {{ form.render("liste_pays") }}
    </div>

    <div class="form-group">
        {{ form.label("liste_allergies[]") }}
        {{ form.render("liste_allergies[]") }}
    </div>

    <div class="form-group row">
        <div class="col-sm-2">Cookies</div>
        <div class="col-sm-5">
            <div class="form-check">
                {{ form.render("accepte_cookie") }}
                {{ form.label("accepte_cookie") }}
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-check">
                {{ form.render("refuse_cookie") }}
                {{ form.label("refuse_cookie") }}
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2">Activités</div>
        <div class="col-sm-3">
            <div class="form-check">
                {{ form.render("velo") }}
                {{ form.label("velo") }}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-check">
                {{ form.render("badminton") }}
                {{ form.label("badminton") }}
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-check">
                {{ form.render("tennis") }}
                {{ form.label("tennis") }}
            </div>
        </div>
    </div>

    <div class="form-group">
        {{ form.label("commentaires") }}
        {{ form.render("commentaires") }}
    </div>

    <div class="form-group">
        {{ form.render("utilisateur_id") }}
    </div>

    <div class="form-group">
        {{ form.label("photo_de_profil") }}
        {{ form.render("photo_de_profil") }}
    </div>

    <div class="form-group">
        {{ form.label("date_de_naissance") }}
        {{ form.render("date_de_naissance") }}
    </div>

    <div class="form-group">
        {{ form.label("nombre_de_chiens") }}
        {{ form.render("nombre_de_chiens") }}
    </div>

    {{ form.render("bouton_de_soumission") }}

</form>