#!/usr/bin/env bash

apt-get remove -y --purge \
    software-properties-common \
    build-essential \
    gcc \
    cpp \
    git \
    apache2 \
    re2c

apt-get clean
apt-get autoclean -y
apt-get autoremove -y
rm -rf /var/lib/apt/lists/* \
    /tmp/* \
    /var/tmp/*
