FROM php:7.2.4-apache-stretch

# install xdebug
RUN apt-get update -y && apt-get install -y \
    && pecl install xdebug

# copy the application
COPY ./application/ /var/www/html

# copy main Apache configuration
COPY build/apache/apache2.conf /etc/apache2/apache2.conf

# copy Apache vhost config
COPY build/apache/scss.vhost.conf /etc/apache2/sites-available/000-default.conf

# copy PHP configuration
COPY build/php/php.ini-development /usr/local/etc/php/php.ini

# copy PHP configuration
COPY build/php/php.ini-xdebug /usr/local/etc/php/conf.d/xdebug.ini

# set project owner
RUN chown -R www-data:www-data /var/www/html