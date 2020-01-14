<h1>Gestion des formulaires</h1>
<h2>Passage des valeurs dans le formulaire</h2>
<h3>Utilisation d'une classe d'entité</h3>
<p>Voir les fichiers app/models/ValeurDefaut.php, app/models/Utilisateurs.php et app/controllers/IndexController.php</p><br />

<form method="post">
	<div class="form-group">
		{{ form.label("pays") }}
		{{ form.render("pays") }}
	</div>

	<div class="form-group">
		{{ form.label("cookies") }}
		{{ form.render("cookies") }}
	</div>

	{{ form.render('bouton_de_soumission') }}
</form>