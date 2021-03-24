FROM php:7.4-fpm-alpine
# COPY wait-for-it.sh /usr/bin/wait-for-it
# RUN chmod +x /usr/bin/wait-for-it
# RUN apk --update --no-cache add git
RUN docker-php-ext-install tokenizer mysqli pdo_mysql
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY php.ini /usr/local/etc/php/
WORKDIR /var/www/html
# CMD composer install ; wait-for-it database:3306 -- bin/console doctrine:migrations:migrate ;  php-fpm 
CMD composer install; php-fpm 
EXPOSE 9000