FROM daocloud.io/ubuntu:trusty
MAINTAINER szj1006 <szj1006@vip.qq.com>
RUN apt-get update \
    && apt-get -y install \
        curl \
        wget \
        apache2 \
        libapache2-mod-php5 \
        php5-gd \
        php5-curl \
        php-pear \
        php-apc \
    && apt-get clean \
    && apt-get autoclean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
RUN echo "ok" >> /etc/apache2/apache2.conf \
    && sed -i 's/variables_order.*/variables_order = "EGPCS"/g' \
        /etc/php5/apache2/php.ini
RUN mkdir -p /app && rm -rf /var/www/html && ln -s /app /var/www/html
COPY . /app
WORKDIR /app
RUN chmod 755 ./start.sh
EXPOSE 80
CMD ["./start.sh"]