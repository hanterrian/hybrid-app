#!/bin/bash

# Specify variables
NUXT_VERSION=3
ENV_DIST_FILE=.env.dev
ENV_FILE=.env
GATEWAY_NETWORK=gateway
COMPOSE_FILE=docker-compose.dev.yml
APP_CONTAINER=app
TEMP_INSTALL_DIRECTORY=src

# Print the Nuxt version
echo "Using Nuxt ${NUXT_VERSION} version"

# Copy the .env file from the dist
if [ ! -f "$ENV_FILE" ]; then
    cp "$ENV_DIST_FILE" "$ENV_FILE"
fi

# Create a shared gateway network
docker network create "$GATEWAY_NETWORK"

# Build containers
docker compose -f "$COMPOSE_FILE" build

# Init a new Nuxt app into a temporary directory
docker compose -f "$COMPOSE_FILE" run --rm --no-deps \
    --user "$(id -u)":"$(id -g)" "$APP_CONTAINER" \
    npx nuxi init "$TEMP_INSTALL_DIRECTORY"

# Set ownership of the temporary directory to the current user
sudo chown -R "$(id -u)":"$(id -g)" "$TEMP_INSTALL_DIRECTORY"

# Move everything from the temporary directory to the current directory
mv ${TEMP_INSTALL_DIRECTORY}/* ${TEMP_INSTALL_DIRECTORY}/.* .

# Remove the temporary directory
rm -r "$TEMP_INSTALL_DIRECTORY"

# Install packages
if [ "$NUXT_VERSION" == 3 ]; then
    docker compose -f "$COMPOSE_FILE" run --rm --no-deps \
        --user "$(id -u)":"$(id -g)" "$APP_CONTAINER" \
        yarn install
fi

# Start containers
docker compose -f "$COMPOSE_FILE" up -d

# Print the final message
echo "The client app has been installed and run on http://localhost:3000."
