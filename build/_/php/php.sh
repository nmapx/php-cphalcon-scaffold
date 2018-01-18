#!/usr/bin/env bash

LC_ALL=en_US.UTF-8 add-apt-repository -y ppa:ondrej/php
apt-get update
apt-get install -y --allow-unauthenticated \
    php7.2 \
    php7.2-dev \
    php7.2-mbstring \
    php7.2-curl \
    php7.2-json \
    php7.2-zip \
    php7.2-intl \
    php7.2-xml
