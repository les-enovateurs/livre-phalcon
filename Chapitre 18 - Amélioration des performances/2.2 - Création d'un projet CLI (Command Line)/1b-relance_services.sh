#!/bin/bash
docker-compose up -d && chmod 777 -Rf www/cache www/public/files
sleep .58
printf "\nLancement de la tâche par défaut\n"
docker exec -it 22-crationdunprojetclicommandline_phalcon-web_1 php run

printf "\nLancement de la tâche exemple de la classe VersionTask\n"
docker exec -it 22-crationdunprojetclicommandline_phalcon-web_1 php run version exemple

printf "\nLancement de la tâche par défaut de la classe VersionTask\n"
docker exec -it 22-crationdunprojetclicommandline_phalcon-web_1 php run version

printf "\nPassage de paramètre\n"
docker exec -it 22-crationdunprojetclicommandline_phalcon-web_1 php run main presentation Jérémy DOE Lyon
