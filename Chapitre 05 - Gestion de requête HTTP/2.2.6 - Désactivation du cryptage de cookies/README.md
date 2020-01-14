La suppression de cookie ne fonctionne pas dans la version 4.0.0.
Cependant le bug a été corrigé dans la version 4.0.1.
Au moment où ces lignes sont écrites la version 4.0.1 n'est pas sortie.
Pour réparer ce problème, il y a deux possibilités : 
 - Si la version 4.0.1 n'est toujours pas sortie, il faut renommer le fichier Dockerfile actuel par Dockerfile_version4.0.1 et renommer le fichier Dockerfile-avant-sortie-v4 par Dockerfile. Il suffit ensuite de reconstruire le conteneur avec docker-compose up -d --build.

 - Si la version 4.0.1 est sortie, il suffit juste de lancer la commande docker-composer up -d --build. En effet le fichier docker-compose.yml actuel indique qu'il faut utiliser la version 4.0.1. C'est uniquement pour ce problème de cookie que c'est le cas.
