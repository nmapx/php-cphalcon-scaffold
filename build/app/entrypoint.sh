#!/usr/bin/env bash

set -e

if [ "$1" = "php-fpm" ]
    then source <(sed -E -n "s/[^#]+/export &/ p" ./.env) && \
        exec php-fpm -F
fi

exec $@
