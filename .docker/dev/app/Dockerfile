# Build arguments
ARG IMAGE_REGISTRY=dev
ARG IMAGE_TAG=latest

# Image
FROM ${IMAGE_REGISTRY}/app-base:${IMAGE_TAG}

# Update dependencies
RUN apt-get update \
# Install Swoole (required by Octane)
    && pecl install swoole \
    && docker-php-ext-enable swoole \
# Install Node (v16 LTS) (required by Octane)
    && curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs \
# Install NPM (required by Octane)
    && npm install -g npm \
    && npm install -g yarn \
    && npm install -g nuxi \
# Install Chokidar (required by Octane)
    && npm install --g chokidar \
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

RUN groupmod -o -g ${PGID} www-data
RUN usermod -o -u ${PUID} -g www-data www-data

# Set up the working directory
WORKDIR /var/www/html/api
RUN chown -R www-data:www-data /var/www/html/api

WORKDIR /var/www/html/client
RUN chown -R www-data:www-data /var/www/html/client

WORKDIR /var/www/html

# Specify the host variable
ENV HOST 0.0.0.0

# Expose the Nuxt port
EXPOSE 3000

# Export the Vite websocket port
EXPOSE 24678

# Export Octane port
EXPOSE 8000

ADD /.docker/dev/app/startup.sh /startup.s
RUN chmod +x /startup.s

CMD ["/startup.s"]

# The health check configuration
HEALTHCHECK --start-period=5s --interval=5s --timeout=5s --retries=3 \
    CMD php artisan octane:status || exit 1
