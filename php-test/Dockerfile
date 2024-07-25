#FROM quay.io/hellofresh/php70:7.1
# FROM php:8.3.9-apache

# RUN apt-get update && apt upgrade -y

# RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

# #ADD./app/var/www/html

# COPY ./docker/nginx/default.conf  /etc/apache2/sites-available/default.conf

# RUN echo 'SetEnv MYSQL_DB_CONNECTION $(MYSQL_DB_CONNECTION}' >> /etc/apache2/conf-enabled/environment.conf

# RUN echo 'SetEnv MYSQL_DB_NAME ${MYSQL_DB_NAME}' >> /etc/apache2/conf-enabled/environment.conf

# RUN echo 'SetEnv MYSQL_USER ${MYSQL_USER}' >> /etc/apache2/conf-enabled/environment.conf

# RUN echo 'SetEnv MYSQL_PASSWORD ${MYSQL_PASSWORD}' >> /etc/apache2/conf-enabled/environment.conf

# RUN echo 'SetEnv SITE_URL ${SITE_URL}' >> /etc/apache2/conf-enabled/environment.conf

# RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf &&\

# a2enmod rewrite &&\

# a2enmod headers &&\

# a2enmod rewrite &&\

# a2dissite 000-default &&\

# a2ensite my-site &&\

# service apache2 restart

# Adds nginx configurations
#ADD ./docker/nginx/default.conf   /etc/nginx/sites-available/default

# Environment variables to PHP-FPM
RUN sed -i -e "s/;clear_env\s*=\s*no/clear_env = no/g" /etc/php/7.1/fpm/pool.d/www.conf

# Set apps home directory.
ENV APP_DIR /server/http

# Adds the application code to the image
ADD . ${APP_DIR}

# Define current working directory.
WORKDIR ${APP_DIR}

# Cleanup
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

EXPOSE 80
