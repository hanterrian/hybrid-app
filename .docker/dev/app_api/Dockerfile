# Build arguments
ARG IMAGE_REGISTRY=dev
ARG IMAGE_TAG=latest

# Image
FROM ${IMAGE_REGISTRY}/api-base:${IMAGE_TAG}

# Update dependencies
RUN apt-get update \
    && apt-get install -y libwebp-dev libpng-dev \
    && apt-get install -y jpegoptim optipng pngquant gifsicle \
# Install Swoole (required by Octane)
    && pecl install swoole \
    && docker-php-ext-enable swoole \
    && docker-php-ext-configure gd --with-freetype --with-webp --with-jpeg \
    && docker-php-ext-install gd \
# Install Node (v16 LTS) (required by Octane)
    && curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs supervisor \
# Install NPM (required by Octane)
    && npm install -g npm \
# Install Chokidar (required by Octane)
    && npm install --g chokidar \
    && npm install -g svgo \
# Clean up the apt cache
    && rm -rf /var/lib/apt/lists/*

# Specify the node path (allow including Chokidar lib globally)
ENV NODE_PATH /usr/lib/node_modules

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Configure non-root user.
ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

# Set up the working directory
WORKDIR /var/www/html/api
RUN chown -R www-data:www-data /var/www/
RUN chown -R www-data:www-data /var/www/html/api

# Export Octane port
EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

# Run the Octane service
#CMD ["php", "artisan", "octane:start", "--server=swoole", "--host=0.0.0.0", "--port=8000", "--max-requests=1000", "--watch"]

# The health check configuration
#HEALTHCHECK --start-period=5s --interval=5s --timeout=5s --retries=3 \
#    CMD php artisan octane:status || exit 1
