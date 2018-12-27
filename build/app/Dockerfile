FROM php:7.3-fpm-alpine3.8

LABEL maintainer="mt@ngen.pl"

ENV PHALCON_VERSION 3.4.2

ARG SYSTEM_UID

COPY . /var/www/html
WORKDIR /var/www/html

RUN echo "http://dl-cdn.alpinelinux.org/alpine/edge/main" >> /etc/apk/repositories && \
    echo "http://dl-cdn.alpinelinux.org/alpine/edge/community" >> /etc/apk/repositories

RUN apk --update --no-cache add -u \
        shadow \
        ca-certificates \
        icu-dev \
        curl-dev \
        make \
        bash \
        nano \
        fcgi \
        autoconf \
        automake \
        dpkg \
        pkgconf \
        file \
        gcc \
        libc-dev \
        re2c \
        zlib-dev \
        git && \
#    php ext
    docker-php-ext-install \
        bcmath \
        opcache \
        intl && \
#    composer
    curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
#    phalcon
    git clone -b "v$PHALCON_VERSION" --single-branch git://github.com/phalcon/cphalcon.git /tmp/cphalcon && \
    cd /tmp/cphalcon/build/php7/64bits && phpize && ./configure CFLAGS="-O2 -g" && make -B && make install && \
    docker-php-ext-enable phalcon --ini-name 50-docker-php-ext-phalcon.ini && \
#    cleanup
    apk del --purge \
        autoconf \
        automake \
        dpkg \
        pkgconf \
        file \
        gcc \
        libc-dev \
        re2c \
        zlib-dev \
        git && \
    rm -rf /var/cache/apk/* \
        /tmp/*

#setup fpm
COPY ./build/app/php/php.ini /usr/local/etc/php/php.ini
COPY ./build/app/php/php-fpm.d/www.conf /usr/local/etc/php-fpm.d/www.conf

#user
RUN usermod -u $SYSTEM_UID www-data && \
    chown -R www-data:www-data .
USER www-data

#dependencies
RUN make -f Makefile.prod composer

HEALTHCHECK --interval=30s --timeout=5s --retries=3 \
    CMD SCRIPT_NAME=/ping SCRIPT_FILENAME=/ping REQUEST_METHOD=GET cgi-fcgi -bind -connect 127.0.0.1:9000 || exit 1

ENTRYPOINT ["./build/app/entrypoint.sh"]
CMD ["php-fpm"]
