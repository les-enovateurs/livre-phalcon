<h1>Bases de données - Abstraction Layer</h1>
<h2>Passage de paramètres</h2>
<h3>Construction d'une simple requête</h3>
<h4>Avec une liste de valeurs - Requête avec ?</h4>
    {% for element in requete_parametre_point_interrogation %}
        <p>Id : {{ element['id'] }}</p>
        <p>Prénom : {{ element['prenom'] }}</p>
        <p>Nom : {{ element['nom'] }}</p>
        <p>Email : {{ element['email'] }}</p>
    {% endfor %}

<h4>Avec un tableau associatif (nom/valeur)</h4>
    {% for element in requete_parametre_par_nom %}
        <p>Id : {{ element['id'] }}</p>
        <p>Prénom : {{ element['prenom'] }}</p>
        <p>Nom : {{ element['nom'] }}</p>
        <p>Email : {{ element['email'] }}</p>
    {% endfor %}
