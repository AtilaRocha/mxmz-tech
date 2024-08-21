# Use a imagem base fornecida pelo Sail para Laravel
FROM laravelsail/php80-composer AS base

# Set the working directory
WORKDIR /var/www/html

# Copy the composer.lock and composer.json files
COPY composer.lock composer.json /var/www/html/

# Install composer dependencies
RUN composer install --optimize-autoloader --no-dev

# Copy the rest of the application files
COPY . /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Run the artisan commands for storage link and other configurations
RUN php artisan storage:link

# Expose the application port
EXPOSE 80

# Define the entrypoint
ENTRYPOINT ["./vendor/bin/sail"]

# The command that gets run by default
CMD ["up"]
