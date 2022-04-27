FROM php:7.3.27-fpm-alpine3.13

MAINTAINER Kaopiz <kaopiz.com>

RUN apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        curl-dev \
        imagemagick-dev \
        libtool \
        libxml2-dev \
        postgresql-dev \
        sqlite-dev \
    && apk add --no-cache \
        curl \
        git \
        imagemagick \
        mysql-client \
        postgresql-libs \
        libintl \
        icu \
        icu-dev \
        libzip-dev \
        freetype \
        libpng \
        libjpeg-turbo \
        freetype-dev \
        libpng-dev \
        libjpeg-turbo-dev \
        supervisor \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install \
        bcmath \
        curl \
        iconv \
        mbstring \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        pdo_sqlite \
        pcntl \
        tokenizer \
        xml \
        zip \
        intl \
        gd \
    && docker-php-source delete \
    && docker-php-ext-install pdo_mysql soap intl zip \
    && curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

ARG DEBUG=false
ENV DEBUG ${DEBUG}

RUN if [ ${DEBUG} = true ]; then \
    pecl install xdebug \
    && \
    docker-php-ext-enable xdebug \
    ;fi

RUN apk del -f .build-deps

COPY ./.docker/php/php.ini /usr/local/etc/php/conf.d/php.ini
COPY ./.docker/supervisor/supervisord.conf /etc/supervisord.conf

# Configure non-root user.
ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

RUN addgroup -g ${PGID} www-docker && \
    adduser -u ${PUID} -G www-docker -D www-docker
RUN chown -R www-docker:www-docker /var/www

WORKDIR /var/www

COPY composer.json .

COPY . .

RUN chown -R www-docker:www-docker ./storage
RUN chmod -R 755 /var/www/storage
RUN chown -R www-docker:www-docker ./bootstrap/cache
RUN chmod -R 777 ./bootstrap/cache

USER www-docker

CMD supervisord -n -c /etc/supervisord.conf
