# 

# Start from the base PHP image with Apache
FROM php:8.3.9-apache

# Update and upgrade packages
RUN apt-get update \
    && apt-get upgrade -y

# Install necessary PHP extensions for MySQL support
RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable mysqli

# Copy your PHP application files into Apache's document root
ADD ./web /var/www/html

# Copy your Apache virtual host configuration if necessary
COPY ./docker/nginx/default.conf /etc/apache2/sites-available/default.conf

# Set environment variables in Apache configuration
# RUN echo 'SetEnv MYSQL_DB_CONNECTION ${MYSQL_DB_CONNECTION}' >> /etc/apache2/conf-enabled/environment.conf \
#     && echo 'SetEnv MYSQL_DB_NAME food' >> /etc/apache2/conf-enabled/environment.conf \
#     && echo 'SetEnv MYSQL_USER root' >> /etc/apache2/conf-enabled/environment.conf \
#     && echo 'SetEnv MYSQL_PASSWORD ${MYSQL_PASSWORD}' >> /etc/apache2/conf-enabled/environment.conf \
#     && echo 'SetEnv SITE_URL http://localhost' >> /etc/apache2/conf-enabled/environment.conf 

# # Set ServerName directive and configure Apache
# RUN echo "ServerName localhost:80" >> /etc/apache2/apache2.conf \
#     && a2enmod rewrite headers \
#     && a2dissite 000-default \
#     && service apache2 restart

# Expose port 80 to the outside world
EXPOSE 80

# Command to run Apache in the foreground when the container starts
# CMD ["apache2-foreground"]
