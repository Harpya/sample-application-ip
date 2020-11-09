FROM eduluz1976/phalcon_xdebug

# USER www-data

# RUN usermod -u 1000 www-data
# RUN usermod -G staff www-data

COPY .docker/app/start.sh /tmp
# /usr/bin
RUN chmod 755 /tmp/start.sh
# RUN chmod +x /usr/bin/start.sh

ENTRYPOINT [ "/tmp/start.sh" ]