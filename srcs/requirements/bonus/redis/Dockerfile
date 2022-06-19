FROM debian:cvignar

RUN apt-get install -y redis

COPY ./conf/redis.conf /var/lib/redis/redis.conf

EXPOSE 6379

CMD ["/usr/bin/redis-server", "/var/lib/redis/redis.conf"]
