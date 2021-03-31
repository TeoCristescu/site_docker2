FROM php:7.2-apache

RUN apt-get update && apt-get install -y

RUN docker-php-ext-install mysqli pdo_mysql

RUN mkdir /app \
 && mkdir /app/teo \
 && mkdir /app/teo/www

COPY pr_web/ /app/teo/www/

RUN cp -r /app/teo/www/* /var/www/html/.
