FROM php:7.4-apache

ENV ACCEPT_EULA=Y
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN apt-get update && apt-get install -y gnupg2 apt-transport-https \
    && curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
    && curl https://packages.microsoft.com/config/debian/11/prod.list > /etc/apt/sources.list.d/mssql-release.list \
    && apt-get update \
    && apt-get install -y msodbcsql17 unixodbc-dev \
    && pecl install sqlsrv-5.10.1 pdo_sqlsrv-5.10.1 \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv \
    && a2enmod rewrite \
    && sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

WORKDIR /var/www/html