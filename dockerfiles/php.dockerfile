FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    zip \
    curl \
    sudo \
    unzip \
    libzip-dev \
    libicu-dev \
    libbz2-dev \
    libpng-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libreadline-dev \
    libfreetype6-dev \
    g++


WORKDIR /var/www/html

COPY . .

# Clear Cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install gd zip

#upload
#RUN echo "file_uploads = On\n" \
#         "memory_limit = 500M\n" \
#         "upload_max_filesize = 500M\n" \
#        "post_max_size = 500M\n" \
#         "max_execution_time = 600\n" \
#         > /usr/local/etc/php/conf.d/uploads.ini

#Install Node Js and Npm
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash -

RUN apt-get install -y nodejs


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#RUN apt-get install -y nodejs npm
#RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

#USER laravel