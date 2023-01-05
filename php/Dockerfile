FROM php:7.4-apache

RUN apt-get update && apt-get install -y libonig-dev git vim && \
    docker-php-ext-install pdo_mysql mysqli mbstring && \
    a2enmod rewrite

WORKDIR /var/www/src

COPY --from=composer:1.10 /usr/bin/composer /usr/bin/composer