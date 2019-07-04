FROM php:7.3-apache 

# CHANGING ROOT OF SERVER TO THE PUBLIC FOLDER OF OUR PROJECT IN OUR MACHINE
WORKDIR /etc/apache2/sites-available/
RUN sed -Ei "s/(\/var\/www\/html)/\/var\/www\/html\/Calendar\/public\//" 000-default.conf
#setting up apache to allow .htaccess
RUN echo '<Directory /var/www/html/camagru/public>\n\tOptions Indexes FollowSymLinks\n\tAllowOverride All\n\tRequire all granted\n</Directory>' >> 000-default.conf

#DOWNLOADING EVERY PACKAGES WE NEED AND THEN RECOMPILING PHP WITH THE GOOD EXTENSIONS
RUN apt-get update && apt-get upgrade -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev 
RUN	apt-get install -y --no-install-recommends git zip
RUN docker-php-ext-install mysqli pdo pdo_mysql

#INSTALLING COMPOSER FROM getcomposer.org
WORKDIR /var/www/html/Calendar/
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN cp composer.phar /usr/local/bin/composer