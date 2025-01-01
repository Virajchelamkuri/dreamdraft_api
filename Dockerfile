# Use the official PHP image from the Docker Hub
FROM php:8.2-apache

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the PHP files into the working directory
COPY . /var/www/html/

# Enable Apache mod_rewrite (if needed for your PHP application)
RUN a2enmod rewrite

# Expose port 80 for the web server
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]