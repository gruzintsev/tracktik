FROM phpdockerio/php80-fpm

RUN apt-get update && apt-get install -y \
        curl \
        zip \
        unzip

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www

CMD ["php-fpm"]