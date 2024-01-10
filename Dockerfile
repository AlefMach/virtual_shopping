FROM php:7.4

WORKDIR /app

COPY ./src /app

RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# COPY ./sql/init.sql /docker-entrypoint-initdb.d/

CMD ["php", "-S", "0.0.0.0:8080", "-t", "./"]