FROM php:8.2-fpm

RUN apt-get update \
    && apt-get -y --no-install-recommends install sudo php8.2-mysql php8.2-gd php8.2-imagick php8.2-xml php-redis mysql-client \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN docker-php-ext-install pdo pdo_mysql

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN curl -sSL https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Install git
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
