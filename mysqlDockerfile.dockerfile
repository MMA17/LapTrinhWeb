FROM mysql:latest

RUN apt update && apt upgrade -y
RUN apt install vim -y

WORKDIR /home/code
ADD . /home/code
ADD ./config/mysql/my.cnf /etc/mysql/my.cnf

ENV MYSQL_ROOT_PASSWORD=123456
ENV MYSQL_USER=viet
ENV MYSQL_PASSWORD=123456

EXPOSE 3306

#ENTRYPOINT ["/usr/sbin/mysqld"]

CMD ["-D", "FOREGROUND"]

RUN mysql -uroot -p123456 -e "create database ltweb"
RUN mysql -uroot -p123456 ltweb < /home/code/initdb.sql
RUN mysql -uroot -p123456 -e "GRANT ALL PRIVILEGES ON * . * TO 'viet'@'%';"