#!/bin/bash
docker-compose up -d && chmod 777 -Rf www/cache www/public/files www/phalcon.log
# Site accessible : http://127.0.0.1
sleep .58
xdg-open http://127.0.0.1