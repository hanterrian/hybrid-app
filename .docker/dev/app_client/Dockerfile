# Build arguments
ARG IMAGE_REGISTRY=dev
ARG IMAGE_TAG=latest

# Image
FROM ${IMAGE_REGISTRY}/client-base:${IMAGE_TAG}

# Update dependencies
RUN apt-get update \
    && apt-get install -y git

RUN apt-get install -y lsb-release gnupg

RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs

RUN #apt-get install -y npm

RUN npm install -g yarn
RUN npm install -g nuxi

# Configure non-root user.
ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

# Set up the working directory
WORKDIR /var/www/html/client
RUN chown -R www-data:www-data /var/www/
RUN chown -R www-data:www-data /var/www/html/client

# Specify the host variable
ENV HOST 0.0.0.0

# Expose the Nuxt port
EXPOSE 3000

# Export the Vite websocket port
EXPOSE 24678

# Run the Nuxt service
CMD ["yarn", "dev", "-o"]
