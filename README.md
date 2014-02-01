tectareas
=========

## Requirements

* Vagrant 1.4.3 (http://www.vagrantup.com/)
* fabric (http://fabfile.org/): Install `sudo apt-get install fabric`

## Settings

1. Add host `192.168.33.72   tectareas.local` to  `/etc/hosts` in host machine    

## Setup

1. `vagrant up`

## First time
1. `git submodule update --init`
2. `fab vagrant bootstrap`

## Run migrations

1. `fab vagrant executemigration`

## Run Seeds

1. `fab vagrant executeseed`

## Development URL

* `tectareas.local`
