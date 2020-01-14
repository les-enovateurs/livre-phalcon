<div class="page-header">
	<h1>4.5 - Vues</h1>
	<p>Voir les fichiers app/controllers/IndexController.php et app/views/index/index.volt</p><br />

	{% for utilisateur in utilisateurs %}

		ID : {{ utilisateur.id }} <br />
		Nom : {{ utilisateur.nom }} <br />
		Prénom : {{ utilisateur.prenom }} <br />
		Email : {{ utilisateur.email }} <br />
		Mot de passe : {{ utilisateur.mot_de_passe }} <br /><br />

	{% endfor %}
</div>



