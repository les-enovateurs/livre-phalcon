<h1>Bases de données - Les modèles Phalcon</h1>
<h2>Snapshot</h2>
<h3>Utilisateur de base</h3>
<p>Nom : {{ premier_utilisateur_base.nom }} - Prénom : {{ premier_utilisateur_base.prenom }} - Email : {{ premier_utilisateur_base.email }}</p>

<h3>Utilisateur modifié</h3>
<p>Nom : {{ premier_utilisateur_modifie.nom }} - Prénom : {{ premier_utilisateur_modifie.prenom }} - Email : {{ premier_utilisateur_modifie.email }}</p>

<h3>Colonnes modifiées</h3>
<h4>Liste des éléments</h4>
<p>{{ colonnes_modifiees|join(' , ') }}</p>

<h4>Est-ce que le prénom a été modifié ?</h4>
<p>{{ prenom_modifiees|default('non') }}</p>

<h4>Est-ce que le nom a été modifié ?</h4>
<p>{{ nom_modifiees|default('non') }}</p>

<h4>Liste des éléments mis à jour en base de données avant la sauvegarde</h4>
<p>{{ colonnes_modifiees_avant_sauvegarde|join(', ')|default('aucun') }}</p>

<h4>Liste des éléments mis à jour en base de données après la sauvegarde</h4>
<p>{{ colonnes_modifiees_apres_sauvegarde|join(', ') }}</p>