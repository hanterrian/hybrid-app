# Builder image
FROM node:16-alpine as builder

# Set up the working directory
WORKDIR /var/www/html/client

# Copy all files into the container
COPY ./client ./

# Install build dependencies
RUN yarn install \
  --prefer-offline \
  --frozen-lockfile \
  --non-interactive \
  --production=false

# Build the app
RUN yarn build

# Install prod dependencies
RUN rm -rf node_modules && \
  NODE_ENV=production yarn install \
  --prefer-offline \
  --pure-lockfile \
  --non-interactive \
  --production=true

# Serving image
FROM node:16-alpine

# Set up the working directory
WORKDIR /var/www/html/client

# Configure non-root user.
ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

RUN chown -R www-data:www-data /var/www/html/client

# Copy the built app
COPY --from=builder /var/www/html/client ./

# Specify the host variable
ENV HOST 0.0.0.0

# Expose the Nuxt port
EXPOSE 3000

# Init the command
CMD ["yarn", "start"]
