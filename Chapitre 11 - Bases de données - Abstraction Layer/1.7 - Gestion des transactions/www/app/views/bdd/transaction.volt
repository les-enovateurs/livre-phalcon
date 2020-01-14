<h1>Bases de données - Abstraction Layer</h1>
<h2>Gestion des transactions</h2>
<h3>Transaction avec erreur</h3>

<h4>Avant l'ouverture de la transaction</h4>
    <h5>Liste d'utilisateur</h5>
    <ul>
        {% for utilisateur in avant_transaction %}
            <li>{{ utilisateur.id ~ " - " ~ utilisateur.nom ~ " - " ~ utilisateur.prenom }}</li>
        {% endfor %}
    </ul>

<h4>Après l'ouverture de la transaction et la suppression de la première ligne</h4>
    <h5>Liste d'utilisateur</h5>
    <ul>
        {% for utilisateur in apres_suppression %}
            <li>{{ utilisateur.id ~ " - " ~ utilisateur.nom ~ " - " ~ utilisateur.prenom }}</li>
        {% endfor %}
    </ul>

<h4>Déclenchement d'une erreur</h4>
    <p>Message d'erreur : {{ erreur1 }}</p>

<h4>Après le retour en arrière</h4>
    <h5>Liste d'utilisateur</h5>
    <ul>
        {% for utilisateur in apres_rollback %}
            <li>{{ utilisateur.id ~ " - " ~ utilisateur.nom ~ " - " ~ utilisateur.prenom }}</li>
        {% endfor %}
    </ul>

<h3>Transaction sans erreur</h3>

<h4>Avant l'ouverture de la transaction</h4>
    <h5>Liste d'utilisateur</h5>
    <ul>
        {% for utilisateur in avant_transaction_sans_erreur %}
            <li>{{ utilisateur.id ~ " - " ~ utilisateur.nom ~ " - " ~ utilisateur.prenom }}</li>
        {% endfor %}
    </ul>

<h4>Après l'ouverture de la transaction et la suppression de la première ligne</h4>
    <h5>Liste d'utilisateur</h5>
    <ul>
        {% for utilisateur in apres_suppression_sans_erreur %}
            <li>{{ utilisateur.id ~ " - " ~ utilisateur.nom ~ " - " ~ utilisateur.prenom }}</li>
        {% endfor %}
    </ul>

<h4>Modification d'un utilisateur sans erreur</h4>
    <h5>Liste d'utilisateur</h5>
    <ul>
        {% for utilisateur in apres_modification_sans_erreur %}
            <li>{{ utilisateur.id ~ " - " ~ utilisateur.nom ~ " - " ~ utilisateur.prenom }}</li>
        {% endfor %}
    </ul>

<h4>Après avoir validé les opérations</h4>
    <h5>Liste d'utilisateur</h5>
    <ul>
        {% for utilisateur in apres_suppression_apres_commit %}
            <li>{{ utilisateur.id ~ " - " ~ utilisateur.nom ~ " - " ~ utilisateur.prenom }}</li>
        {% endfor %}
    </ul>