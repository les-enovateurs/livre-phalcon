<h1>Protection des échanges entre l'utilisateur connecté et l'API</h1>
<p>Voir les fichiers suivants</p>
<ul>
    <li>api/app/plugins/SecurityPlugin.php</li>
    <li>api/app/config/services.php (service dispatcher)</li>
    <li>api/composer.json</li>
    <li>api/public/index.php</li>
    <li>api/app/config/config.php (security)</li>
    <li>api/app/controllers/IndexController.php</li>
    <li>api/app/controllers/UtilisateursController.php</li>
    <li>api/app/config/router.php</li>
    <hr />
    <li>web/app/library/ClientApi.php</li>
    <li>web/app/config/services.php (service api)</li>
    <li>web/app/controllers/IndexController.php</li>
    <li>web/app/controllers/EnseignantController.php</li>
    <li>web/app/views/enseignant/index.volt</li>
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