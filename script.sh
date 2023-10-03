#!/bin/bash

# Check if MariaDB is installed
if ! command -v mysql &> /dev/null; then
    echo "MariaDB is not installed. Please install it first."
    exit 1
fi

# Variables
DB_NAME="mywebsite_db"
DB_USER="your_user"
DB_PASS="your_password"

# Enable MariaDB (if not already enabled)
service start mariadb
service stop mariadb 
service nginx enable 
sudo mysqld_safe --skip-grant-tables &

sleep 5


sudo mariadb -u root -p "" <<EOF
	FLUSH PRIVILEGES;
	ALTER USER 'root'@localhost IDENTIFIED BY 'root_password';II
	FLUSH PRIVILEGES;
	CREATE DATABASE mywebsite;
	CREATE USER 'your_user'@localhost IDENTIFIED BY 'your_password';
	GRANT ALL PRIVILEGES ON $DB_NAME.* TO $DB_USER@'localhost';
	FLUSH PRIVILEGES;
	
EOF
serivce mariadb stop
serivce mariadb start
sudo mariadb -u $DB_USER -p $DB_PASSWORD <<EOF
	USE mywebsite_db;
	CREATE TABLE users (id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255),
        password VARCHAR(255)
	);

EOF
# Create the database
#mysql -e "CREATE DATABASE IF NOT EXISTS $DB_NAME;"

# Create a database user and grant privileges
#mysql -e "CREATE USER '$DB_USER'@'localhost' IDENTIFIED BY '$DB_PASS';"
#mysql -e "GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'localhost';"
#mysql -e "FLUSH PRIVILEGES;"

# Optional: Print information
echo "MariaDB enabled, database '$DB_NAME' created, and user '$DB_USER' granted privileges."

