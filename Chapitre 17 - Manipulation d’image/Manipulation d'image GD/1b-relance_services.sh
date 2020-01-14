#!/bin/bash
docker-compose up -d && chmod 777 -Rf www/cache www/public/files www/public/img
# Site accessible : http://127.0.0.1
sleep .58
xdg-open http://127.0.0.1