<h1>Bases de données - Utilisation de PHQL</h1>
<h2>Utilisation de Query Builder</h2>
<h3>Liste</h3>
<h4>Des utilisateurs</h4>
<ul>
    {% for utilisateur in liste_utilisateurs %}
        <li>{{ utilisateur.prenom }}</li>
    {% endfor %}
</ul>

<h3>Un seul utilisateur</h3>
<p>{{ un_utilisateur_simple.prenom }}</p>

<h3>Affichage de deux tables sans liaison</h3>
<p>Prénom : {{ utilisateur_entreprise.readAttribute('helloWorld\Models\Utilisateurs').prenom }} - Entreprise - {{ utilisateur_entreprise.readAttribute('helloWorld\Models\Entreprises').nom }}</p>

<h3>Limitation à deux lignes</h3>
<ul>
    {% for utilisateur in liste_utilisateurs_limite %}
        <li>{{ utilisateur.prenom }}</li>
    {% endfor %}
</ul>

<h3>Limitation à deux lignes avec un saut de 3 lignes</h3>
<ul>
    {% for utilisateur in liste_utilisateurs_limite_offset %}
        <li>{{ utilisateur.prenom }}</li>
    {% endfor %}
</ul>

<h3>Jointure naturelle entre deux tables</h3>
<h4>Jointure avec la fonction form()</h4>
<p>Prénom : {{ utilisateur_entreprise.readAttribute('helloWorld\Models\Utilisateurs').prenom }} - Entreprise - {{ utilisateur_entreprise.readAttribute('helloWorld\Models\Entreprises').nom }}</p>

<h4>Jointure avec la fonction join()</h4>
<p>Prénom : {{ prenom_join }} - Entreprise - {{ nom_join }}</p>

<h3>Sélection de colonne</h3>
<h4>Toutes les colonnes</h4>
<p>Représentation du résultat en JSON : {{ utilisateur_jointure_simple_toutes_colonnes|json_encode }}</p>

<h4>Avec uniquement la colonne prenom de l'utilisateur en utilisant l'espace de noms</h4>
<p>Représentation du résultat en JSON : {{ utilisateur_jointure_colonne|json_encode }}</p>

<h4>Avec uniquement la colonne prenom de l'utilisateur et le nom de l'entreprise en utilisant l'espace de noms</h4>
<p>Représentation du résultat en JSON : {{ utilisateur_jointure_colonnes|json_encode }}</p>

<h3>Mise en place d'alias sur les tables</h3>
<h4>Jointure naturelle</h4>
<p>Prénom : {{ utilisateur_jointure_avec_alias.prenom }} - Entreprise - {{ utilisateur_jointure_avec_alias.nom }}</p>
<h4>Jointure manuelle</h4>
<p>Prénom : {{ utilisateur_jointure_manuelle_avec_alias.prenom }} - Entreprise - {{ utilisateur_jointure_manuelle_avec_alias.nom }}</p>


<h3>Conditions</h3>
<h4>Simple : Le prénom contient un o</h4>
<p>Représentation du résultat en JSON : {{ utilisateurs_jointure_colonne_conditions_simple|json_encode }}</p>

<h4>Combinaison de conditions avec l'opérateur ET : Le prenom contient un o ET l'entreprise id = 2</h4>
<p>Représentation du résultat en JSON : {{ utilisateurs_jointure_colonne_conditions_et|json_encode }}</p>

<h4>Combinaison de conditions avec l'opérateur OU : Le prenom contient un o OU l'entreprise id = 2</h4>
<p>Représentation du résultat en JSON : {{ utilisateurs_jointure_colonne_conditions_ou|json_encode }}</p>

<h4>Conditionnement d'une colonne dans un intervalle de valeurs : id entre 4 et 8</h4>
<p>Représentation du résultat en JSON : {{ utilisateurs_jointure_colonnes_conditions_entre|json_encode }}</p>

<h4>Conditionnement d'une colonne avec une liste de valeurs inclusive : CTO, responsable, cadre</h4>
<p>Représentation du résultat en JSON : {{ utilisateurs_condition_liste_valeur|json_encode }}</p>

<h4>Conditionnement d'une colonne avec une liste de valeurs exclusive : CTO, responsable, cadre</h4>
<p>Représentation du résultat en JSON : {{ utilisateurs_condition_pas_dans_liste_valeur|json_encode }}</p>

<h3>Groupement de données</h3>
<h4>Sans condition - par nom</h4>
<p>Représentation du résultat en JSON : {{ utilisateurs_groupby_nom|json_encode }}</p>

<h4>Avec une condition - par nom d'entreprise avec une condition : le nombre d'employés par entreprise doit être supérieur à 2</h4>
<p>Représentation du résultat en JSON : {{ utilisateurs_groupby_nom_having|json_encode }}</p>

<h3>Passage de paramètres dans la fonction d'exécution de requête : Nombre d'employés > 1 et le nom de l'entreprise contient la lettre u</h3>
<p>Représentation du résultat en JSON : {{ utilisateurs_parametres|json_encode }}</p>