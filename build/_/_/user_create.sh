#!/usr/bin/env bash

useradd -m -s /bin/bash -u ${SYSTEM_UID} docker
chown -R docker:docker .
