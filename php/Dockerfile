FROM php:7.4-apache

# ⬇️ 1. 拡張機能インストーラーを別の公式イメージからコピーして持ってくる
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

# ⬇️ 2. apt-get を使わず、ツール経由で安全にPHPモジュールをインストールする
RUN install-php-extensions pdo_mysql mysqli mbstring zip && \
    a2enmod rewrite

WORKDIR /var/www/src

COPY --from=composer:2.2.5 /usr/bin/composer /usr/bin/composer