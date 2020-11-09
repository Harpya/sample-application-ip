#!/bin/bash

echo "Starting "


mkdir /srv/logs/web 2> /dev/null

chmod 777 /srv/logs/web

/usr/local/apache2/bin/httpd

 while :; do echo 'Hit CTRL+C'; sleep 1; done
 
# sleep 100