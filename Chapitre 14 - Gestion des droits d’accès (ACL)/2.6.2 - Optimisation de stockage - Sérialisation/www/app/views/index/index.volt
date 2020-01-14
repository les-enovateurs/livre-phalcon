<h1>Gestion des droits d'accès (ACL)</h1>
<h2>Stockage dans un fichier grâce à la sérialisation</h2>
<p>Voir le fichier app/plugins/SecurityPlugin.php et app/config/services.php (service dispatcher), phalcon.log et app/security/acl.data</p>
<p>Voir les fichiers présents dans les répertoires app/controllers et app/views.</p><br />

<h3>Différents liens d'accès</h3>
<h4>Accès vendeur</h4>
<p><a href="{{ url("vendeurs/profil") }}">Edition de profil vendeur</a></p>
<p><a href="{{ url("produits/nouveau") }}">Nouveau produit</a></p>
<p><a href="{{ url("produits/edition") }}">Edition d'un produit</a></p>
<h4>Accès client</h4>
<p><a href="{{ url("clients/profil") }}">Edition de profil client</a></p>
<p><a href="{{ url("produits/acheter") }}">Acheter un produit</a></p>
<h5>Divers</h5>
<p><a href="{{ url("fonction/verification/avance") }}">Vérification d'accès avec des paramètres</a></p>
<p><a href="{{ url("heritage/role") }}">Héritage de rôle</a></p>