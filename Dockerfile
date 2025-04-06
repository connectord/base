FROM alpine:3.21

# Latest versions as of 2025-04-06
ENV NGINX_VERSION=1.26.3
ENV PHP_VERSION=8.3
ENV ALPINE_PHP=83

# Install packages
RUN apk add --no-cache \
    php${ALPINE_PHP} \
    php${ALPINE_PHP}-fpm \
    # php${PHP_VERSION}-opcache \
    # php${PHP_VERSION}-pdo \
    # php${PHP_VERSION}-pdo_mysql \
    # php${PHP_VERSION}-mysqli \
    # php${PHP_VERSION}-json \
    # php${PHP_VERSION}-openssl \
    # php${PHP_VERSION}-curl \
    # php${PHP_VERSION}-zlib \
    # php${PHP_VERSION}-xml \
    # php${PHP_VERSION}-mbstring \
    # php${PHP_VERSION}-session \
    # php${PHP_VERSION}-tokenizer \
    # php${PHP_VERSION}-fileinfo \
    # curl \
    nginx \
    supervisor

# Set up packages
COPY nginx.conf /etc/nginx/nginx.conf
COPY fpm.conf /etc/php${PHP_VERSION}/php-fpm.d/www.conf
COPY php.ini /etc/php${PHP_VERSION}/php.ini
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Create directory structure
RUN mkdir -p /connectord/{web,worker,log} \
    mkdir -p /connectord/log/{web,app,job} \
    && mkdir -p /run/nginx \
    && mkdir -p /run/php \
    && mkdir -p /var/log/php-fpm

# Install the connectord system
COPY worker/main.php /connectord/worker/main.php
COPY web/index.php /connectord/web/index.php

# Set working directory
WORKDIR /connectord/web

# Expose port
EXPOSE 80

# Start supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]