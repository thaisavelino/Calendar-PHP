FROM php:7.3-apache 
WORKDIR /etc/apache2/sites-available/
RUN sed -Ei "s/(\/var\/www\/html)/\/var\/www\/html\/Calendar\/public\//" 000-default.conf
RUN docker-php-ext-install mysqli