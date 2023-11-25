#!/bin/bash

# Start PHP-FPM
service php7.3-fpm start
# Start Nginx
service nginx start


# Keep the script running to keep the container running
tail -f /dev/null

