FROM d9magai/http2apache:latest

# EXPOSE 443
EXPOSE 80

COPY apache.conf /usr/local/apache2/conf/extra/httpd-ssl.conf

RUN adduser www-data

# /usr/local/apache2/bin/httpd

COPY start.sh /tmp
# /usr/bin
RUN chmod 755 /tmp/start.sh
# RUN chmod +x /usr/bin/start.sh

ENTRYPOINT [ "/tmp/start.sh" ]