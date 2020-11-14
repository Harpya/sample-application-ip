FROM d9magai/http2apache:latest



EXPOSE 80

COPY httpd.conf /usr/local/apache2/conf/httpd.conf

RUN mkdir /usr/local/apache2/conf/conf.d && mkdir /usr/local/apache2/conf/sites.d

COPY conf.d/* /usr/local/apache2/conf/conf.d/
COPY sites.d/* /usr/local/apache2/conf/sites.d/

RUN adduser www-data

COPY start.sh /tmp

RUN chmod 755 /tmp/start.sh

ENTRYPOINT [ "/tmp/start.sh" ]