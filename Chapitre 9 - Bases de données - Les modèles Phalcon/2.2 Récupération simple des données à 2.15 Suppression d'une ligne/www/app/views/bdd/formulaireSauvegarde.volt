<h1>Bases de données - Les modèles Phalcon</h1>
<h2>Sauvegarde des données d'un formulaire</h2>
<form method="POST" action="{{ url("bdd/formulaireSauvegarde") }}">
    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" class="form-control" name="prenom" placeholder="Prénom">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Email">
    </div>

    <div class="form-group">
        <label for="mot_de_passe">Mot de passe</label>
        <input type="text" class="form-control" name="mot_de_passe" placeholder="Mot de passe">
    </div>

    <div class="form-group">
        <label for="fonction">Fonction</label>
        <input type="text" class="form-control" name="fonction" placeholder="Fonction">
    </div>

    <div class="form-group">
        <label for="nationalité">Nationalité</label>
        <input type="text" class="form-control" name="nationalité" placeholder="Nationalité">
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<h3>Liste des derniers utilisateurs</h3>
<ul>
    {% for utilisateur in liste_utilisateur %}
        <li>Prénom : {{ utilisateur.prenom }} - Email : {{ utilisateur.email }}</li>
    {% endfor %}
</ul>