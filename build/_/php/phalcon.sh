#!/usr/bin/env bash

git clone -b v3.4.1 --single-branch git://github.com/phalcon/cphalcon.git /tmp/cphalcon
cd /tmp/cphalcon/build && ./install

echo "extension=phalcon.so" > /etc/php/7.2/mods-available/phalcon.ini
ln -sf /etc/php/7.2/mods-available/phalcon.ini /etc/php/7.2/cli/conf.d/50-phalcon.ini
