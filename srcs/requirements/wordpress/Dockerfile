FROM debian:cvignar
RUN		apt-get install -y unzip php-fpm php-redis
COPY ./conf/www.conf /etc/php/7.3/fpm/pool.d/www.conf

ARG	mysql_db
ARG	mysql_user
ARG	mysql_password
ARG	wordpress_db_host
ARG	wordpress_table_prefix
ARG	wordpress_debug

RUN apt-get install -y wordpress
COPY ./conf/wp-config.php /usr/share/wordpress
COPY ./conf/wp-content.zip /
RUN	rm -fr /usr/share/wordpress/wp-content && unzip -q wp-content.zip -d /usr/share/wordpress/
COPY ./conf/object-cache.php /usr/share/wordpress/wp-content 
RUN sed -i "s/MYSQL_DB/$mysql_db/g" /usr/share/wordpress/wp-config.php
RUN	sed -i "s/MYSQL_USER/$mysql_user/g" /usr/share/wordpress/wp-config.php
RUN	sed -i "s/MYSQL_PASSWORD/$mysql_password/g" /usr/share/wordpress/wp-config.php
RUN	sed -i "s/WP_DB_HOST/$wordpress_db_host/g" /usr/share/wordpress/wp-config.php
RUN	sed -i "s/WP_TABLE_PREFIX/$wordpress_table_prefix/g" /usr/share/wordpress/wp-config.php
RUN	sed -i "s/WP_DEBUG/$wordpress_debug/g" /usr/share/wordpress/wp-config.php

RUN	chown -R www-data:www-data /usr/share/wordpress

RUN sed -i "s/session.save_handler = files/session.save_handler = redis/g" /etc/php/7.3/fpm/php.ini && \
	sed -i "s/;session.save_path = \"\/var\/lib\/php\/sessions\"/\session.save_path = \"tcp\:\/\/redis\:6379\"/" /etc/php/7.3/fpm/php.ini

RUN service php7.3-fpm start
EXPOSE 9000

ENTRYPOINT ["/usr/sbin/php-fpm7.3", "-F"]
