FROM httpd:latest

RUN apt update && apt upgrade -y
RUN apt install vim -y

WORKDIR /home/code
ADD . /home/code
ADD ./config/httpd/httpd.conf /usr/local/apache2/conf/httpd.conf

EXPOSE 80

ENTRYPOINT ["/usr/local/apache2/bin/httpd"]

CMD ["-D", "FOREGROUND"]
