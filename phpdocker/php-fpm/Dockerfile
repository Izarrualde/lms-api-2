FROM phpdockerio/php73-fpm:latest
WORKDIR "/var/www/lms-api"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install apt-utils
RUN apt-get update \
    && apt-get install -y apt-utils \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install php7.3-odbc
RUN apt-get update \
    && apt-get install -y php7.3-odbc \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install php7.3-gd
RUN apt-get update \
    && apt-get install -y php7.3-gd \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install php7.3-mysql
RUN apt-get update \
    && apt-get install php7.3-mysql \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install git
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install xdebug
RUN apt-get update \
    && apt-get install php-xdebug \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
