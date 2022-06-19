FROM debian:cvignar

RUN		apt-get install -y mariadb-server

ARG mysql_root_password
ARG mysql_user
ARG mysql_password
ARG mysql_db

COPY ./conf/wordpress.sql ./wordpress.sql

RUN service mysql start && mysqladmin -u root password ${mysql_root_password} && \
	echo "CREATE DATABASE IF NOT EXISTS ${mysql_db}" | mysql -u root -p${mysql_root_password} && \
	mysql -u root -p${mysql_root_password} ${mysql_db} < wordpress.sql && \
 	echo "CREATE USER IF NOT EXISTS '${mysql_user}' IDENTIFIED BY '${mysql_password}';" | mysql -u root -p${mysql_root_password} && \
 	echo "GRANT ALL PRIVILEGES ON ${mysql_db}.* TO '${mysql_user}' IDENTIFIED BY '${mysql_password}';" | mysql -u root -p${mysql_root_password} && \
 	echo "FLUSH PRIVILEGES;" | mysql -u root -p${mysql_root_password}

RUN sed -i "s/#port/\port/" /etc/mysql/mariadb.conf.d/50-server.cnf && \
	sed -i "s/bind-address/\#bind-address/" /etc/mysql/mariadb.conf.d/50-server.cnf

EXPOSE 3306

ENTRYPOINT ["/usr/sbin/mysqld"]
