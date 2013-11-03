# encoding: utf-8
from fabric.api import env, local, run, task, require
import re
from updater import update


#
# Environments
#
@task
def vagrant():
    """
Ambiente local de desarrollo (máquina virtual Vagrant).
"""
    # Usuario "vagrant"
    env.user = "vagrant"
    # Se conecta al ssh local
    env.hosts = ["127.0.0.1:2222"]

    # Llave ssh creada por Vagrant
    result = local("vagrant ssh-config | grep IdentityFile", capture=True)
    env.key_filename = result.split()[1].replace('"', '')

    # Directorio del sitio pinwin
    env.site_dir = "~/tectareas"
