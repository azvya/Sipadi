FROM php:8.1-fpm

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

LABEL maintainer="Pilih Jurusan"

ARG GID
ARG NODE_VERSION

WORKDIR /usr/share/nginx

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone \
    && apt-get update \
    && apt-get install -y gnupg gosu curl ca-certificates zip unzip git supervisor sqlite3 libcap2-bin libpng-dev dnsutils librsvg2-bin \
    && chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions \
    curl mysqli sqlite3 gd \
    imap mbstring sockets \
    xml zip bcmath soap pcntl \
    intl readline ldap opcache \
    msgpack igbinary redis xdebug  
RUN curl -sLS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    && mkdir -p /etc/apt/keyrings \
    && curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg \
    && echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_$NODE_VERSION.x nodistro main" > /etc/apt/sources.list.d/nodesource.list \
    && apt-get update && apt-get install -y nodejs \
    default-mysql-client \
    && npm install -g npm \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    && setcap "cap_net_bind_service=+ep" /usr/local/bin/php \
    && mkdir -p /var/log/supervisor \
    && groupadd --force -g $GID codeigniter \
    && useradd -ms /bin/bash --no-user-group -g $GID -u 1337 codeigniter

COPY start-container.sh /usr/local/bin/start-container.sh
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY php.ini /usr/local/etc/php/cli/conf.d/99-codeigniter.ini

RUN chmod +x /usr/local/bin/start-container.sh
EXPOSE 9000

CMD ["start-container.sh"]


