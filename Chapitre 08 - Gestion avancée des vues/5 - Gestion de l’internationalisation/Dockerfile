FROM php:7.2-apache-stretch

LABEL   description="Installation d'Apache 2, PHP 7.2 et Phalcon" \
        maintainer="Jérémy PASTOURET <jeremy.pastouret@gmail.com>" \
        name="apache2_php7_phalcon_version"

# liste des arguments
ARG phalcon_version='v3.4.3'
ARG env='prod'

# Installation de Wget, Curl, gnupg, zip, unzip et libzip-dev
RUN apt update --fix-missing;
RUN apt install -y wget curl gnupg zip unzip libzip-dev

# Ajout de l'extension zip pour Composer
RUN docker-php-ext-install zip

# Installation de Git
RUN apt install -y git

# Aller dans le répertoire temporaire et télécharger le projet Phalcon
RUN cd /tmp && git clone "git://github.com/phalcon/cphalcon.git"

# Ouverture du nouveau répertoire
RUN cd /tmp/cphalcon && git checkout tags/$phalcon_version -b $phalcon_version

# Installation de php-dev gcc libpcre3-dev php-pgsql libpq-dev
RUN apt install gcc libpcre3-dev libpq-dev -y

# Ouverture du répertoire de compilation et installation
RUN cd /tmp/cphalcon/build && ./install 

# Activation de l'extension de phalcon
RUN docker-php-ext-enable phalcon

# Activation des extensions PostgreSql
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# Installation de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Activation de l'extension de réécriture d'URL
RUN a2enmod rewrite

# Ajout de l'extension intl et de gettext pour l'internationalisation de l'application
RUN apt install -y libicu-dev
RUN docker-php-ext-install intl
RUN docker-php-ext-install gettext

# Ajout des locales système
RUN apt install -y locales
RUN echo "en_GB.UTF-8 UTF-8" >> /etc/locale.gen
RUN locale-gen

# Redémarrage Apache
RUN /etc/init.d/apache2 restart