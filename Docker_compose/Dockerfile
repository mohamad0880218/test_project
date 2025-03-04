# Use the official NGINX image
FROM nginx:latest

# Set the working directory to NGINX's web directory
WORKDIR /usr/share/nginx/html

# Copy all files from the current directory into NGINX's web root
COPY . .

# Expose port 80 to access the website from the host machine
EXPOSE 80

# Start NGINX in the foreground (necessary for Docker container)
CMD ["nginx", "-g", "daemon off;"]
