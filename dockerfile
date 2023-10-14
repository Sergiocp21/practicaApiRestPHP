#PHP
FROM php:8.2-apache

#Actualiza el sistema y utilidades
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip
#Dependencias
RUN docker-php-ext-install pdo pdo_mysql

#Instalacion composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#Copia de los archivos al contenedor
COPY . /var/www/html

#Inicia Apache al ejecutarse
CMD [ "apache2-foreground" ]
