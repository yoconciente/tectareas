include_recipe "apt"
include_recipe "build-essential"
include_recipe "mysql::server"
include_recipe "apache2"

%w{libapache2-mod-php5 php5 mysql-server mysql-client
   git-core build-essential tree vim-nox
   libapache2-mod-auth-mysql php5-mysql}.each do
|pkg|
  package pkg do
    action :install
  end
end

web_app "tectareas" do
  server_name "tectareas.local"
  server_aliases ["www.tectareas.local"]
  docroot "/vagrant/tectareas"
  allow_override "All"
end
