<h1>Connexion</h1>

<p><a href="{{ url("tableauDeBord") }}">Page reservée uniquement aux utilisateurs connectés</a></p>

<h3>Liste des comptes disponibles</h3>
<ul>
    {% for utilisateur in utilisateurs %}
        <li>{{ utilisateur.email }}</li>
    {% endfor %}
</ul>

{% if erreurs is defined %}
    <div class="alert alert-danger alert-dismissible fade show">
        {{ erreurs }}
    </div>
{% endif %}

<form method="post" action="{{ url("connexion") }}">
    <label>Email :</label>
    <input type="text" name="email"/>
    <input type="submit" class="btn btn-primary" value="Se connecter"/>
</form>
