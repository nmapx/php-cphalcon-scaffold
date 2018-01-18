#!/usr/bin/env bash

sh $(dirname $0)/packages.sh
sh $(dirname $0)/../_/php/phalcon_fpm.sh
sh $(dirname $0)/../_/_/user_create.sh

mkdir -p /var/run/php
