# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

  config.vm.box = "precise32"
  config.vm.box_url = "http://files.vagrantup.com/precise32.box"

  # Port fowarding 
  config.vm.network :forwarded_port, guest: 8000, host: 8000
  
  # Private IP  
  config.vm.network :private_network, ip: "192.168.33.72"

  # Shared folders.
  config.vm.synced_folder "./tectareas", "/var/www/tectareas"
  config.vm.synced_folder "./tectareas/app/storage", "/var/www/tectareas/app/storage", owner: "www-data", group: "www-data"
  config.vm.synced_folder "./tectareas/public/uploads", "/var/www/tectareas/public/uploads", :mount_options => ['dmode=777','fmode=777']

  # Provision
  config.vm.provision :chef_solo do |chef|
      chef.json = {
	"mysql" => {
              "server_root_password" => "password",
              "server_repl_password" => "password",
              "server_debian_password" => "password"
              }	
	}
      chef.run_list = ["recipe[tectareas]"]
  end

end
