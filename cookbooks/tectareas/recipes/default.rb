# Recipes

include_recipe "apt"
include_recipe "build-essential"
include_recipe "mysql::server"
include_recipe "apache2"


# Install Basic Packages

%w{libapache2-mod-php5 php5 mysql-server mysql-client
zsh git-core build-essential tree vim-nox
libapache2-mod-auth-mysql php5-mysql curl
phpmyadmin}.each do
|pkg|
  package pkg do
    action :install
  end
end

# Defines host
web_app "tectareas" do
  server_name "tectareas.local"
  server_aliases ["www.tectareas.local"]
  docroot "/var/www/tectareas"
  allow_override "All"
end

# Configure zsh
#bash "Configurar zsh con oh-my-zsh!" do
#    code <<-EOH
#git clone git://github.com/jairtrejo/oh-my-zsh.git /home/vagrant/.oh-my-zsh
#cp /home/vagrant/.oh-my-zsh/templates/zshrc.zsh-template /home/vagrant/.zshrc
#usermod -s /bin/zsh vagrant
#EOH
#end
