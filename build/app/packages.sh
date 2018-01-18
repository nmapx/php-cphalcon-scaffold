#!/usr/bin/env bash

sh $(dirname $0)/../_/packages.sh
sh $(dirname $0)/../_/gosu/gosu.sh
sh $(dirname $0)/../_/php/php_fpm.sh
sh $(dirname $0)/../_/php/phalcon.sh
sh $(dirname $0)/../_/cleanup.sh
