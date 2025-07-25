FROM code4romania/php:8.2 AS vendor

WORKDIR /var/www

COPY --chown=www-data:www-data . /var/www

# install extensions
RUN set -ex; \
    install-php-extensions \
    bcmath

RUN set -ex; \
    composer install \
    --optimize-autoloader \
    --no-interaction \
    --no-plugins \
    --no-dev \
    --prefer-dist

FROM node:22-alpine AS assets

WORKDIR /build

COPY \
    package.json \
    package-lock.json \
    postcss.config.js \
    vite.config.js \
    ./

RUN set -ex; \
    npm ci --no-audit --ignore-scripts

COPY --from=vendor /var/www /build

RUN set -ex; \
    npm run build

FROM vendor

ARG VERSION
ARG REVISION

RUN echo "$VERSION (${REVISION:0:7})" > /var/www/.version

COPY docker/s6-rc.d /etc/s6-overlay/s6-rc.d
COPY --from=assets --chown=www-data:www-data /build/public/build /var/www/public/build

ENV SENTRY_SAMPLE_RATE=1.0

EXPOSE 80
