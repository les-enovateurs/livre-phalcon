<h1>Gestion des formulaires</h1>
<h2>Enregistrement des données</h2>
<h3>Mise à jour d'une entrée</h3>
<p>Voir le fichier app/controllers/IndexController.php</p>

<form method="post">
	<div class="form-group">
		{{ utilisateur_form.label("nom") }}
		{{ utilisateur_form.render("nom") }}
	</div>

	<div class="form-group">
		{{ utilisateur_form.label("prenom") }}
		{{ utilisateur_form.render("prenom") }}
	</div>

	<div class="form-group">
		{{ utilisateur_form.label("email") }}
		{{ utilisateur_form.render("email") }}
	</div>

	<div class="form-group">
		{{ utilisateur_form.label("mot_de_passe") }}
		{{ utilisateur_form.render("mot_de_passe") }}
	</div>

	{{ utilisateur_form.render('bouton_de_soumission') }}
</form>