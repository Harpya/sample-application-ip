#!/bin/bash

echo "Starting "
chmod 777 /srv/logs/app

docker-php-entrypoint php-fpm

# sleep 100