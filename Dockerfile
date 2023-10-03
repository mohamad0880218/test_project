FROM debian 
# TZ=America/New_York
RUN apt-get update
RUN apt-get install -y nginx vim curl
RUN apt-get install -y mariadb-server 
RUN apt-get install -y php php-fpm git
RUN git clone https://github.com/mohamad0880218/test_project.git
RUN cp -r ./test_project/ /var/www/html/
RUN mv ./test_project/default /etc/nginx/sites-available/default
#RUN service mariadb start
#RUN mariadb -e "CREATE USER 'myuser'@'localhost' IDENTIFIED BY 'mypassword';" \
    && mariadb -e "GRANT ALL PRIVILEGES ON *.* TO 'myuser'@'localhost';" \
    && mariadb -e "FLUSH PRIVILEGES;"
#RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Expose MariaDB default port
EXPOSE 3306

# Start MariaDB service when the container runs
CMD ["mysqld"]
CMD ["nginx","-g","daemon off;"]

