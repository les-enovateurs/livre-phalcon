<h1>Simplification de la récupération de l'utilisateur connecté</h1>
<p>Voir les fichiers suivants</p>
<ul>
    <li>api/app/config/services.php (service utilisateur)</li>
    <li>api/app/controllers/UtilisateursController.php</li>
</ul>

{%  if erreurs is defined %}
    <div class="alert alert-danger">
        {{ erreurs }}
    </div>
{% endif %}

<form method="post">
    <h1>Connexion à NovaMooc</h1>

    <div class="form-group">
        {{ connexion_form.label("email") }}
        {{ connexion_form.render("email") }}
    </div>

    <div class="form-group">
        {{ connexion_form.label("mot_de_passe") }}
        {{ connexion_form.render("mot_de_passe") }}
    </div>

    {{ connexion_form.render('bouton_de_soumission') }}
</form>

<br /><br />
<h3>Compte disponible</h3>
<p>E-mail : john.doe@les-enovateurs.com</p>
<p>Mot de passe : azerty</p>