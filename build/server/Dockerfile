FROM nginx:1.13-alpine

LABEL maintainer="mt@ngen.pl"

COPY . /var/www/app
WORKDIR /var/www/app

COPY build/server/nginx/nginx.conf /etc/nginx/nginx.conf
COPY build/server/nginx/app.conf /etc/nginx/app.conf
COPY build/server/nginx/conf.d/ /etc/nginx/conf.d/
