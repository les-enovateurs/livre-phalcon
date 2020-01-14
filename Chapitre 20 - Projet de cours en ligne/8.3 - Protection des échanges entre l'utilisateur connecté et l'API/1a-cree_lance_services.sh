#!/bin/bash
sudo rm -Rf postgres-data && docker-compose up -d --build && chmod 777 -Rf web/cache web/public/files
docker exec -it 83-protectiondeschangesentrelutilisateurconnectetlapi_mooc-web_1 composer install
docker exec -it 83-protectiondeschangesentrelutilisateurconnectetlapi_mooc-web_1 composer update
# Site accessible : http://127.0.0.1
sleep .58
xdg-open http://127.0.0.1
