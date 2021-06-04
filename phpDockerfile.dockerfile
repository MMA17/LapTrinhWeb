FROM php:7.3-fpm

RUN apt update && apt upgrade -y
RUN apt install vim -y
RUN docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install opcache
RUN docker-php-ext-configure opcache --enable-mysqli \
    && docker-php-ext-install mysqli
RUN docker-php-ext-configure opcache --enable-pdo_mysql \
    && docker-php-ext-install pdo_mysql

WORKDIR /home/code
ADD . /home/code
ADD /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

EXPOSE 9000

ENTRYPOINT ["docker-php-entrypoint"]

CMD ["-D", "FOREGROUND"]
