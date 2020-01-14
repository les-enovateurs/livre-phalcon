
<img src="{{ static_url("img/logo.png") }}" alt="logo"/>

<h1>
	Liste des utilisateurs
</h1>
<p>Voir le fichier app/views/index/index.volt</p>

{% for utilisateur in utilisateurs %}

	ID : {{ utilisateur.id }} <br />
	Nom : {{ utilisateur.nom }} <br />
	Prénom : {{ utilisateur.prenom }} <br />
	Email : {{ utilisateur.email }} <br />
	Mot de passe : {{ utilisateur.mot_de_passe }} <br /><br />

{% endfor %}

