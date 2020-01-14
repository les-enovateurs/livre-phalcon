#!/bin/bash
docker-compose up -d && chmod 777 -Rf www/cache www/public/files
sleep .58
printf "\nLancement de la tâche par défaut\n"
docker exec -it 23-fusiondunprojetsimpleavecunprojetcli_phalcon-web_1 php run

printf "\n\nLancement de la tâche exemple de la classe VersionTask\n"
docker exec -it 23-fusiondunprojetsimpleavecunprojetcli_phalcon-web_1 php run version exemple

printf "\n\nLancement de la tâche par défaut de la classe VersionTask\n"
docker exec -it 23-fusiondunprojetsimpleavecunprojetcli_phalcon-web_1 php run version

printf "\n\nPassage de paramètre\n"
docker exec -it 23-fusiondunprojetsimpleavecunprojetcli_phalcon-web_1 php run main presentation Jérémy DOE Lyon

# Site accessible : http://127.0.0.1
sleep .58
xdg-open http://127.0.0.1