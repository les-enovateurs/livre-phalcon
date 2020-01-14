<h1>Méthode GET</h1>
<p>Voir les fichiers app/config/router.php, app/controllers/IndexController.php et app/controllers/UtilisateurController.php</p><br />

<p>
    <a href="{{ url('recherche/test/oiseau') }}">Test URL de recherche sans contrainte</a>
</p>
<p>
    <a href="{{ url('utilisateur/edition/10') }}">Test URL d'edition avec la contrainte respectée</a>
</p>
<p>
    <a href="{{ url('utilisateur/edition/a') }}">Test URL d'edition avec la contrainte non respectée</a>
</p>