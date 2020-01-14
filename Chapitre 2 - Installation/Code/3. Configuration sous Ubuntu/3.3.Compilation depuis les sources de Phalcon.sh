# Installation de git
sudo apt install git -y

# Copie du projet distant Phalcon
git clone "git://github.com/phalcon/cphalcon.git"

# Ouverture du projet
cd cphalcon

# Récupération de la version 3.4.3
git checkout tags/v3.4.3 -b v3.4.3

# Vérification de la branche
git status

# Installation des composants nécessaires à la compilation de Phalcon
sudo apt install php-dev gcc libpcre3-dev -y

# extension PostgreSQL
sudo phpenmod pgsql
sudo phpenmod pdo_pgsql

# Ouverture du répertoire de compilation
cd build/

# Installation de Phalcon
sudo ./install
