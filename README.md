# Phalcon - Développez des applications web complexes et performantes en PHP
<p align="center">
  <a href="https://www.buymeacoffee.com/enovateurs" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/default-violet.png" height="41px" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>
</p>

Ce projet GitHub contient les sources du livre : [Phalcon 3 - Développez des applications web complexes et performantes en PHP](https://amzn.to/3a82uFI)

Pour tout problème, vous pouvez me contacter sur le site https://les-enovateurs.com/

## Avec GitHub
Je vous encourage aussi à faire des fork et à améliorer le projet NovaBook. Je suis ouvert à toutes sortes d'améliorations. Je vous ferai un retour sur ces améliorations et les approuverai si elles me semblent correctes.

## Organisation des répertoires
Le code source du livre est présenté ainsi :

Il y a trois branches sur ce projet : 
- v4.0.x
- v3.4.x
- master

De cette manière, vous pouvez consulter le code en version 3 et/ou en version 4. 

La branche master contient l'évolution entre les deux versions, c'est à dire qu'au départ le master contenait la version 3 puis j'ai ajouté la version 4. Pour chaque chapitre/projet de la branche master, il est possible de voir trouver la différence entre les deux versions en cliquant sur le bouton history.

Dans chaque sous-répertoire de version de Phalcon se trouvent différents projets, dont les noms sont rattachés à un titre du livre.
Tout le code du livre est présent dans ces répertoires.

A l'intérieur de chaque projet Phalcon se trouvent plusieurs répertoires/fichiers de base :

Le répertoire **www** contient le code source du projet Phalcon présenté dans le livre.
Le reste des fichiers permet de monter l'infrastructure de développement/production avec Docker.
### Docker
#### linux 1a-cree_lance_services.sh
Ce script permet de créer ou de recréer les services. En d'autres termes, la base de données est vidée et recréée de zéro.

Le service de base de données et le serveur Web est recréé/recompilé. C'est plutôt conseillé lorsqu'on change souvent de version de Phalcon.

Sans l'utilisation de ce fichier Docker peut, à certains moments, se tromper et lancer la version 4 alors que c'est la version 3 qui est souhaitée.
Ce script permet de s'assurer de la version de Phalcon utilisée, car l'image est recompilée rapidement mais proprement.
#### 1b-relance_services.php
Ce script permet de relancer les services sans détruire la base de données. En d'autre termes, vous relancez votre serveur Web et base de données pour les retrouver dans le même état où vous les aviez laissés.

Il faut donc utiliser ce script après avoir lancé une première fois linux 1a-cree_lance_services.sh puis avoir utilisé le script 2-stop.sh

#### 2-stop.sh
Ce script permet d'arrêter le conteneur Web et base de données sans supprimer les données. Il y a juste le répertoire cache qui est vidé.

### Sans Linux
Il y a plusieurs solutions, soit installer Ubuntu sous Windows. Soit utiliser Cygwin. Soit transformer les scripts bash en batch.

### Sans Docker
Il faut suivre la procédure présentée dans le chapitre 2 - Installation.

Je trouve que Docker est plus pratique mais ce n'est qu'un avis, vous êtes libres d'installer un serveur directement sur votre machine. 

Cela marchera aussi.

## Autres informations
Dans certains projets/répertoires se trouve un fichier à README.md. Je vous invite à le consulter avant toute utilisation des projets.
