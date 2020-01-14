<h2>xDebug la liste des utilisateurs</h2>
{% for utilisateur in utilisateurs %}

	ID : {{ utilisateur.id }} <br />
	Nom : {{ utilisateur.nom }} <br />
	Prénom : {{ utilisateur.prenom }} <br />
	Email : {{ utilisateur.email }} <br />
	Mot de passe : {{ utilisateur.mot_de_passe }} <br /><br />

{% endfor %}

