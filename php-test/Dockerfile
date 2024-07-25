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

# Expose port 80 to the outside world
EXPOSE 80

