<h1>Bases de données - Abstraction Layer</h1>
    <h2>Récupération de données - toutes les lignes</h2>
        <h3>Les différents mode de récupération des données / Spécification du mode de récupération des données</h3>
            <h4>FETCH_NUM - element[1]</h4>
                {% for element in recuperation_numero %}
                    <p>Prénom {{ element[1] }}</p>
                {% endfor %}

            <h4>FETCH_ASSOC - element['prenom']</h4>
                {% for element in recuperation_associative %}
                    <p>Prénom {{ element['prenom'] }}</p>
                {% endfor %}

            <h4>FETCH_BOTH - element[1] / element['prenom'] </h4>
                {% for element in recuperation_associative_numero %}
                    <p>Prénom {{ element['prenom'] }} - Id {{ element[0] }} - Prenom {{ element[1] }}</p>
                {% endfor %}

            <h4>FETCH_OBJ - element.prenom </h4>
                {% for element in recuperation_objet %}
                    <p>Prénom {{ element.prenom }}</p>
                {% endfor %}