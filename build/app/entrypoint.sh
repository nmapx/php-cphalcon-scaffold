#!/usr/bin/env bash

set -e

if [ "$1" = 'php-fpm' ]
    then source <(sed -E -n 's/[^#]+/export &/ p' ./.env) && \
        exec gosu root "/usr/sbin/php-fpm7.2" "-F"
fi

exec "$@"
