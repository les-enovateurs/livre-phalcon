<h1>Gestion de la sécurité</h1>
    <h2>CSRF - Cross-Site Request Forgery - Sécurisation de formulaire</h2>
        <h3>Formulaire de création de compte</h3>
        <form action="{{ url("securite/csrf") }}" method="POST">
            <input type="text" name="email"/>
            <input type="hidden" name="{{ cle_token }}" value="{{ token }}"/>
            <input type="submit" class="btn btn-primary" value="Envoyer"/>
        </form>

        <h3>Information</h3>
        <p>Nom du token dans le formulaire : {{ cle_token }}</p>
        <p>Valeur du token dans le formulaire : {{ token }}</p>
        <p>Token valide après l'envoi du formulaire : {{ token_valide }}</p>