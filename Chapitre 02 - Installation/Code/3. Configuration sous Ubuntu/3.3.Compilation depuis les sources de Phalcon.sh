# Installation de git
sudo apt install git -y

# Copie du projet php-psr
git clone https://github.com/jbboehr/php-psr.git

# Compilation et installation php-psr
cd php-psr
phpize
./configure
make
make test
sudo make install

# Ajout de l'extension PSR dans PHP
echo 'extension=psr.so' > /etc/php/7.2/mods-available/psr.ini

# Retour en arrière
cd ..

# Copie du projet distant Phalcon
git clone "git://github.com/phalcon/cphalcon.git"

# Ouverture du projet
cd cphalcon

# Récupération de la version 4.0.0
git checkout tags/v4.0.0 -b v4.0.0

# Installation des composants nécessaires à la compilation de Phalcon
sudo apt install php-dev gcc libpcre3-dev -y

# extension PostgreSQL
sudo phpenmod pgsql
sudo phpenmod pdo_pgsql

# Ouverture du répertoire de compilation
cd build/

# Installation de Phalcon
sudo ./install
