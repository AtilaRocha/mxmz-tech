FROM laravelsail/php80-composer AS base

WORKDIR /var/www/html

COPY composer.lock composer.json /var/www/html/

RUN composer install --optimize-autoloader --no-dev

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html

ARG WWWGROUP=1000
ARG WWWUSER=1000
RUN groupadd --force -g ${WWWGROUP} sail \
    && useradd --force -u ${WWWUSER} --gid ${WWWGROUP} --create-home sail

RUN php artisan storage:link

EXPOSE 80

ENTRYPOINT ["./vendor/bin/sail"]

CMD ["up"]
