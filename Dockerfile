FROM node:23.1.0 AS nodebuilder
WORKDIR /usr/src/app

COPY package*.json ./
RUN npm install

COPY ./ ./
RUN npm run build

FROM php:8.2-fpm
WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libzip-dev \
    libgd-dev

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-external-gd
RUN docker-php-ext-install gd

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

USER www

COPY --from=composer /usr/bin/composer /usr/local/bin/composer

COPY --chown=www:www ./ ./
RUN composer install

COPY --from=nodebuilder --chown=www:www /usr/src/app/public/build/ /var/www/public/build/

EXPOSE 9000
CMD ["php-fpm"]
