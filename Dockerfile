FROM php:8.3-apache

# Install mysqli and pdo_mysql
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable rewrite module
RUN a2enmod rewrite

# Copy project files
COPY . /var/www/html/

# Copy and setup entrypoint
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
