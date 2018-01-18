#!/usr/bin/env bash

apt-get update
apt-get install -y --no-install-recommends \
    software-properties-common \
    ca-certificates \
    curl \
    nano \
    net-tools \
    wget \
    git \
    make \
    re2c

sh $(dirname $0)/php/php.sh
sh $(dirname $0)/php/composer.sh
