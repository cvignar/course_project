FROM debian:cvignar

RUN apt-get install -y adminer php-fpm php-redis

COPY ./conf/www.conf /etc/php/7.3/fpm/pool.d/www.conf

RUN sed -i "s/session.save_handler = files/session.save_handler = redis/g" /etc/php/7.3/fpm/php.ini && \
	sed -i "s/;session.save_path = \"\/var\/lib\/php\/sessions\"/\session.save_path = \"tcp\:\/\/redis\:6379\"/" /etc/php/7.3/fpm/php.ini

RUN service php7.3-fpm start

EXPOSE 9000

ENTRYPOINT ["/usr/sbin/php-fpm7.3", "-F"]
