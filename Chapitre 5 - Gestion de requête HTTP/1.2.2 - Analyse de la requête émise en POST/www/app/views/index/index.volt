<h1>Analyse de la requête émise en POST</h1>
<fieldset>Inscription</fieldset>
<form method="POST" action="{{ url("inscription") }}">

    <label for="email">E-mail</label>
    <input type="text" name="email" required/>

    <label for="mot de passe">Mot de passe</label>
    <input type="password" name="mot_de_passe" required/>

    <input type="submit" value="Enregistrer"/>

</form>