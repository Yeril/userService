
FROM composer:1.9.3 as vendor


WORKDIR /tmp/

COPY composer.json composer.json
COPY composer.lock composer.lock

FROM php:7.2-apache-stretch

EXPOSE 3002

COPY . /var/www/html
COPY --from=vendor /tmp/vendor/ /var/www/html/vendor/

RUN chmod +x /entrypoint.sh

CMD ["apache2-foreground"]

ENTRYPOINT ["/entrypoint.sh"]