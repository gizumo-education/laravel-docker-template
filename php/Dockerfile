FROM php:7.4-apache

RUN sed -i 's|^deb http://deb.debian.org/debian bullseye main|deb http://snapshot.debian.org/archive/debian/20221114T000000Z bullseye main|' /etc/apt/sources.list \
    && sed -i 's|^deb http://deb.debian.org/debian-security bullseye-security main|deb http://snapshot.debian.org/archive/debian-security/20221114T000000Z bullseye-security main|' /etc/apt/sources.list \
    && sed -i 's|^deb http://deb.debian.org/debian bullseye-updates main|deb http://snapshot.debian.org/archive/debian/20221114T000000Z bullseye-updates main|' /etc/apt/sources.list \
    && apt-get -o Acquire::Check-Valid-Until=false update \
    && apt-get install -y \
        gnupg \
        git \
        libonig-dev \
        libzip-dev \
        unzip \
        zlib1g-dev \
        cron \
        vim \
    && docker-php-ext-install \
        pdo_mysql \
        mysqli \
        mbstring \
        opcache \
        zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/src

COPY --from=composer:2.2.5 /usr/bin/composer /usr/bin/composer