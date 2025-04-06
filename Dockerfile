FROM alpine:3.21

LABEL maintainer="wogan@outlook.com"
LABEL version="0.1"
LABEL org.opencontainers.image.description="Base image for connectord system"

ARG BUILD_INFO

# Latest versions as of 2025-04-06
ENV NGINX_VERSION=1.26.3
ENV PHP_VERSION=8.4
ENV ALPINE_PHP=84

# Install packages
RUN apk add --no-cache \
    php${ALPINE_PHP} \
    php${ALPINE_PHP}-fpm \
    php${ALPINE_PHP}-pcntl \
    php${ALPINE_PHP}-curl \
    nginx \
    supervisor 

# We need a non-root user
RUN adduser -D -s /sbin/nologin connectord

# Set up packages
COPY nginx.conf /etc/nginx/nginx.conf
COPY fpm.conf /etc/php${PHP_VERSION}/php-fpm.d/www.conf
COPY php.ini /etc/php${PHP_VERSION}/php.ini
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Create directory structure
RUN mkdir -p /connectord/ \
    && mkdir -p /connectord/web \
    && mkdir -p /connectord/worker \
    && mkdir -p /connectord/log \
    && mkdir -p /var/lib/nginx/tmp \
    && mkdir -p /var/lib/nginx/logs \
    && mkdir -p /var/log/php84 \
    && mkdir -p /run/nginx \
    && mkdir -p /run/php 

# Adjust permissions within the container
RUN chown -R connectord:connectord /connectord \
    && chown -R connectord:connectord /var/log/php84 \
    && chown -R connectord:connectord /var/lib/nginx \
    && chmod -R 0777 /run/nginx \
    && chmod -R 0777 /var/lib/nginx \
    && chmod -R 0777 /var/lib/nginx/logs

# Install the connectord system
COPY worker/main.php /connectord/worker/main.php
COPY web/index.php /connectord/web/index.php

# Set working directory
WORKDIR /connectord/web

# Store build info for later use
RUN echo "$BUILD_INFO" > /connectord/web/build

# Expose port
EXPOSE 80

# Start supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]