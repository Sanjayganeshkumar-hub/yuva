FROM php:8.1-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy application files to /var/www/html/
COPY . /var/www/html/

# Ensure correct permissions
RUN chown -R www-data:www-data /var/www/html/

# Expose port 80
EXPOSE 80
