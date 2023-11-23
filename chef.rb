# recipes/default.rb

# Update package repositories
apt_update 'update' do
  action :update
end

# Install Nginx package
package 'nginx' do
  action :install
end

# Start and enable Nginx service
service 'nginx' do
  action [:start, :enable]
end

# Create a basic HTML file
file '/var/www/html/index.html' do
  content '<html><body><h1>Hello, Chef!</h1></body></html>'
  action :create
end
