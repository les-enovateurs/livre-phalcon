<h1>Gestion des types de champs d'un formulaire</h1>
<h2>Création de types personnalisés</h2>
<p>Voir les fichiers app/forms/Chap6Form.php, app/forms/IntervalPersonnalise.php et app/forms/ListeDeroulantePersonnalise.php</p><br />

<form method="post">
    <div class="form-group">
        {{ form.label("poids") }}
        {{ form.render("poids") }}
    </div>
    <div class="form-group">
        {{ form.label("liste_pays") }}
        {{ form.render("liste_pays") }}
    </div>
</form>