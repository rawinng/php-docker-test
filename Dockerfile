FROM php:8-apache-buster

## Install extensions
RUN apt-get update && \
    docker-php-ext-install -j$(nproc) mysqli

RUN a2enmod rewrite

WORKDIR /var/www/html
COPY ./src/ .

VOLUME [ "/var/www/html" ]
EXPOSE 80

CMD ["apache2-foreground"]