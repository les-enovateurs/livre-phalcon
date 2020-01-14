<h1>Gestion de la sécurité</h1>
    <h2>Hash de mot de passe</h2>
    <h3>Formulaire de connexion</h3>
        <form action="{{ url("securite/hash") }}" method="POST">
            <input type="password" name="mot_de_passe"/>
            <input type="submit" class="btn btn-primary" value="Envoyer"/>
        </form>

    <h3>Information</h3>
        <p>Mot de passe à saisir : {{ mot_de_passe_a_saisir }}</p>
        <p>Mot de passe à saisir avec un hash : {{ mot_de_passe_a_saisir_avec_hash }}</p>
        <p>Mot de passe saisi ayant subit un hash : {{ mot_de_passe_avec_hash }}</p>
        <p>Mot de passe accepté (1= Oui, 0=Non) : {{ mot_de_passe_valide|default(0) }}</p>