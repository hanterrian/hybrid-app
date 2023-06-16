# Build arguments
ARG IMAGE_REGISTRY=dev
ARG IMAGE_TAG=latest

# Image
FROM ${IMAGE_REGISTRY}/app-base:${IMAGE_TAG}

# Set up the working directory
WORKDIR /var/www/html/api

# Run the queue service
CMD ["php", "artisan", "queue:work"]
