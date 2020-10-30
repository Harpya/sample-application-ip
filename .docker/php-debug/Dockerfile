FROM harpya/php72-fpm-xdebug:latest

WORKDIR /var/www/html

ARG CACHEBUST=1

COPY  php-debug/xdebug.ini /usr/local/etc/php/conf.d
COPY  php-debug/run_fpm.sh /root
COPY  php-debug/phalcon.ini /usr/local/etc/php/conf.d/phalcon.ini 
COPY  php-debug/zephir.phar /usr/bin/zephir

RUN chmod 755 /root/run_fpm.sh
RUN chmod +x /usr/bin/zephir

RUN rm -rf /usr/local/etc/php/conf.d/zz-docker.conf

ENV XDEBUG_CONFIG "remote_connect_back=0"
#ENV PHP_IDE_CONFIG="serverName="


RUN cd && git clone https://github.com/jbboehr/php-psr.git \
    && cd php-psr \
    && phpize \
    && ./configure \
    && make \ 
    && make install

RUN cd && git clone git://github.com/phalcon/php-zephir-parser.git \
    && cd php-zephir-parser \
    && phpize \ 
    && ./configure \ 
    && make \ 
    && make install 


RUN cd && git clone https://github.com/phalcon/cphalcon \
    && cd cphalcon/ \
    && git checkout tags/v4.0.0 ./ \
    && zephir fullclean \
    && zephir build \ 
    && cp /root/cphalcon/ext/modules/phalcon.so /usr/local/lib/php/extensions/no-debug-non-zts-20170718/phalcon.so

RUN rm -rf /root/cphalcon /root/php-psr /root/php-zephir-parser

RUN docker-php-ext-install pdo_pgsql

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === 'c31c1e292ad7be5f49291169c0ac8f683499edddcfd4e42232982d0fd193004208a58ff6f353fde0012d35fdd72bc394') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/bin/composer
