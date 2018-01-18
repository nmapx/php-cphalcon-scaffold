FROM ubuntu:16.04

LABEL maintainer="mt@ngen.pl"

ARG SYSTEM_UID
ARG DEBIAN_FRONTEND="noninteractive"

COPY . /var/www/app
WORKDIR /var/www/app

RUN sh build/app/setup.sh

COPY build/app/php/7.2/fpm/pool.d/ /etc/php/7.2/fpm/pool.d/

USER docker

RUN make -f Makefile.prod composer

ENTRYPOINT ["build/app/entrypoint.sh"]
CMD ["php-fpm", "prod"]
