<h1>Bases de données - Les modèles Phalcon</h1>
<h2>Pagination d'une grosse requête</h2>
<h3>Liste des utilisateurs</h3>
<ul>
    {% for utilisateur in utilisateur_pagination.items %}
        <li>{{ utilisateur.prenom }}</li>
    {% endfor %}
</ul>

<a href='{{ url('bdd/pagination') }}'>Première Page</a> - <a href='{{ url('bdd/pagination?page=')~utilisateur_pagination.before }}'>Page précédente</a> - Vous êtes à la page {{ utilisateur_pagination.current }}/{{ utilisateur_pagination.total_pages }} - <a href='{{ url('bdd/pagination?page=')~utilisateur_pagination.next }}'>Page suivante</a> - <a href='{{ url('bdd/pagination?page=')~utilisateur_pagination.last }}'>Dernière page</a>
<br />
<small>Il y a {{ utilisateur_pagination.total_items }} utilisateurs.</small>