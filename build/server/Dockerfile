FROM nginx:1.15-alpine

LABEL maintainer="mt@ngen.pl"

COPY . /var/www/html
WORKDIR /var/www/html

RUN apk --update --no-cache add -u \
    curl && \
#    cleanup
    rm -rf /var/cache/apk/* \
        /tmp/*

COPY build/server/nginx/nginx.conf /etc/nginx/nginx.conf
COPY build/server/nginx/html.conf /etc/nginx/html.conf
COPY build/server/nginx/conf.d/ /etc/nginx/conf.d/

HEALTHCHECK --interval=30s --timeout=5s --retries=3 \
    CMD curl --fail http://127.0.0.1:80/nginx_status || exit 1
