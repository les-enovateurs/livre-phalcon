<h1>Méthode POST</h1>
<h2>Récupération de fichier</h2>

{% for fichier in info_fichiers %}
    <p>Nom du fichier : {{ fichier['nom'] }}</p>
    <p>Type du fichier (donnée navigateur) : {{ fichier['type_navigateur'] }}</p>
    <p>Type du fichier (donnée du fichier) : {{ fichier['type_fichier'] }}</p>
    <p>Taille du fichier : {{ fichier['taille'] }}</p>
    <p>Extension du fichier : {{ fichier['extension'] }}</p>
    <p>Chemin temporaire du fichier : {{ fichier['chemin_temporaire'] }}</p>
    <p>Erreur d'upload : {{ fichier['erreur'] }}</p>
{% endfor %}