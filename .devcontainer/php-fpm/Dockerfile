#FROM php:fpm-alpine
#FROM php:7.3-fpm-alpine
FROM php:8.0.7-fpm-alpine

# fix work iconv library with alphine
RUN apk add --no-cache --repository http://dl-cdn.alpinelinux.org/alpine/edge/community/ --allow-untrusted gnu-libiconv
ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install PHP extensions
RUN apk update && apk upgrade --update && apk --no-cache add \
    git \
    vim less \
    icu-dev \
    oniguruma-dev \
    autoconf \
    make \
    g++ \
    gcc \
    libtool \
    libzip-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    mysql-client \
    nodejs \
    npm \
    && rm -r /var/cache/apk/*

RUN docker-php-ext-install -j$(nproc) \
    iconv \
    intl \
    mbstring \
    pdo_mysql

COPY  php.ini /usr/local/etc/php/conf.d/my-php.ini
COPY  php-fpm.conf /usr/local/etc/php-fpm.d/my-php-fpm.conf