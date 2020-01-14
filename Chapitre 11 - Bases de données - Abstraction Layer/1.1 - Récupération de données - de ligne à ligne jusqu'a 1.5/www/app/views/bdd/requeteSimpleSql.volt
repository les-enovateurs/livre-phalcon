<h1>Bases de données - Abstraction Layer</h1>
    <h2>Récupération de données - de ligne à ligne</h2>
        <h3>Lecture ligne à ligne</h3>
            {% for element in liste_personnalise %}
                <p>{{ element }}</p>
            {% endfor %}

        <h3>Récupération du nombre de ligne retournées</h3>
            <p>{{ nombre_ligne }}</p>

        <h3>Déplacer le curseur de lecture</h3>
            <h4>Déplacement à la troisième ligne (en comptant à partir de 0)</h4>
                <p>Id : {{ ligne_3['id'] }}</p>
                <p>Prénom : {{ ligne_3['prenom'] }}</p>
                <p>Nom : {{ ligne_3['nom'] }}</p>
                <p>Email : {{ ligne_3['email'] }}</p>

    <h2>Récupération de données - toutes les lignes</h2>
        <h3>Tableau de donnée</h3>
            {% for element in tableau_de_donnee %}
                <p>Id : {{ element['id'] }}</p>
                <p>Prénom : {{ element['prenom'] }}</p>
                <p>Nom : {{ element['nom'] }}</p>
                <p>Email : {{ element['email'] }}</p>
            {% endfor %}

    <h2>Récupération de la première ligne</h2>
        <p>Id : {{ une_ligne_de_donnee['id'] }}</p>
        <p>Prénom : {{ une_ligne_de_donnee['prenom'] }}</p>
        <p>Nom : {{ une_ligne_de_donnee['nom'] }}</p>
        <p>Email : {{ une_ligne_de_donnee['email'] }}</p>