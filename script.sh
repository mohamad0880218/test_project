#!/bin/bash

# Check if MariaDB is installed

# Variables
DB_NAME="mywebsite"
DB_USER="your_user"
DB_PASS="your_password"

# Enable MariaDB (if not already enabled)
#service mariadb stop
#systemctl stop mariadb
service nginx enable 
#sudo mysqld_safe --skip-grant-tables &
mysqld_safe --skip-grant-tables &
service mariadb start 
systemctl start mariadb
sleep 5
#ALTER USER 'root'@localhost IDENTIFIED BY 'root_password';

mariadb -u root -p" " <<EOF
	FLUSH PRIVILEGES;
	
	FLUSH PRIVILEGES;
	CREATE DATABASE mywebsite;
	CREATE USER 'your_user'@localhost IDENTIFIED BY 'your_password';
	GRANT ALL PRIVILEGES ON $DB_NAME.* TO $DB_USER@'localhost';
	FLUSH PRIVILEGES;
	
EOF
echo "database created"
#systemctl stop mariadb
#service mariadb stop
#systemctl start mariadb
#sericce mariadb start
mariadb -u $DB_USER -p"your_password" <<EOF
	USE $DB_NAME;
	CREATE TABLE users (id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255),
        password VARCHAR(255)
	);

EOF
echo "database and user created"
# Create the database
#mysql -e "CREATE DATABASE IF NOT EXISTS $DB_NAME;"

# Create a database user and grant privileges
#mysql -e "CREATE USER '$DB_USER'@'localhost' IDENTIFIED BY '$DB_PASS';"
#mysql -e "GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'localhost';"
#mysql -e "FLUSH PRIVILEGES;"

# Optional: Print information
echo "MariaDB enabled, database '$DB_NAME' created, and user '$DB_USER' granted privileges."

