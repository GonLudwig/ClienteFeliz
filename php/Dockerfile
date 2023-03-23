FROM php:7.4-fpm-alpine

ADD ./php/www.conf /usr/local/etc/php-fpm.d/www.conf

ADD ./php/php.ini /usr/local/etc/php/conf.d/php.ini

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

RUN mkdir -p /var/www/html

RUN chown -R laravel:laravel /var/www/html

WORKDIR /var/www/html

RUN apk add --no-cache \
    freetype \
    libpng \
    libpq-dev \
    libjpeg-turbo \
    freetype-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    mysql-dev

RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg

RUN docker-php-ext-install pdo pdo_mysql mysqli