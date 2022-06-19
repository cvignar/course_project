FROM debian:cvignar
RUN		apt-get install -y nginx && \
		mkdir /etc/nginx/ssl && mkdir /usr/share/wordpress && \
		mkdir /usr/share/adminer && mkdir -p /etc/nginx/ssl

ARG		domain_name

COPY	./conf/nginx.conf /etc/nginx/nginx.conf
COPY	./conf/default /etc/nginx/sites-available/default
# COPY	./conf/inception.crt /etc/nginx/ssl
# COPY	./conf/inception.key /etc/nginx/ssl

COPY	./conf/bonus-site /var/www/html
COPY	./conf/bonus-site/index.html /usr/share/wordpress

RUN		sed -i "s/DOMAIN_NAME/$domain_name/g" /etc/nginx/sites-available/default

EXPOSE 5443 5080 443 80

ENTRYPOINT ["nginx"]
