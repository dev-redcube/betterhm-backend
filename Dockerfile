FROM composer AS composer

# Copying the source directory and install the dependencies with composer
COPY . /app

# Run composer install to install the dependencies
RUN composer install \
  --optimize-autoloader \
  --no-dev \
  --no-interaction \
  --no-progress


# Continue stage build with the desired image and copy the source including the dependencies downloaded by composer
FROM trafex/php-nginx:latest
RUN rm -r /var/www/html/*

USER root
RUN apk add php82-curl php82-gd php82-gettext php82-mbstring php82-opcache php82-pdo php82-pdo_mysql php82-soap php82-xml php82-zip php82-pecl-redis
USER nobody

COPY --chown=nginx --chmod=777 --from=composer /app /var/www/html

COPY nginx.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/html

#RUN php artisan config:cache
#RUN php artisan event:cache
#RUN php artisan route:cache
#RUN php artisan view:cache


#CMD php artisan migrate
