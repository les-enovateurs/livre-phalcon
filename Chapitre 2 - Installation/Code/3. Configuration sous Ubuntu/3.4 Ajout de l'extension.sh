# Ajout de l'extension Phalcon dans PHP
echo 'extension=phalcon.so' > /etc/php/7.2/mods-available/phalcon.ini

# Activation de l'extension Phalcon
sudo phpenmod phalcon

# Redémarrage du serveur Apache 2
sudo service apache2 restart