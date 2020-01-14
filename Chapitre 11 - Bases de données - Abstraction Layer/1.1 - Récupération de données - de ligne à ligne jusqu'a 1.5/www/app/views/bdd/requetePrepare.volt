<h1>Bases de données - Abstraction Layer</h1>
<h2>Passage de paramètres</h2>
<h3>Construction d'une requête préparée</h3>
<h4>Requête préparée sans le typage des paramètres</h4>
    {% for element in requete_prepare %}
        <p>Id : {{ element['id'] }}</p>
        <p>Prénom : {{ element['prenom'] }}</p>
        <p>Nom : {{ element['nom'] }}</p>
        <p>Email : {{ element['email'] }}</p>
    {% endfor %}

<h4>Requête préparée en typant les paramètres</h4>
    {% for element in requete_prepare_type %}
        <p>Id : {{ element['id'] }}</p>
        <p>Prénom : {{ element['prenom'] }}</p>
        <p>Nom : {{ element['nom'] }}</p>
        <p>Email : {{ element['email'] }}</p>
    {% endfor %}