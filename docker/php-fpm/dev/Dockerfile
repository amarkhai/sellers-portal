FROM phpdockerio/php:8.1-fpm
WORKDIR "/application"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        php8.1-gd \
        php8.1-imagick \
        php8.1-pgsql \
        php8.1-soap \
        php8.1-xdebug \
        php8.1-redis \
        php8.1-yaml; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN curl -sL https://deb.nodesource.com/setup_16.x | bash; \
    apt-get install nodejs