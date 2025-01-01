FROM php:7.4-apache

# Install the required PHP extensions
RUN docker-php-ext-install mysqli

# Enable Apache mod_rewrite (if needed for routing)
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
