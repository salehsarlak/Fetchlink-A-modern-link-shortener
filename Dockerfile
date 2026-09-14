FROM php:8.3-apache

# Install mysqli and pdo_mysql extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache rewrite module (useful for clean URLs later)
RUN a2enmod rewrite

# Copy project files
COPY . /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port
EXPOSE 80
