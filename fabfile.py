# encoding: utf-8
from fabric.api import cd, env, local, run, task, require

#
# Environments
#


@task
def vagrant():
    '''
    Ambiente local de desarrollo (máquina virtual Vagrant).
    '''
    # Usuario
    env.user = 'vagrant'
    # Se conecta al ssh local
    env.hosts = ['127.0.0.1:2222']

    # Llave ssh creada por Vagrant
    result = local('vagrant ssh-config | grep IdentityFile', capture=True)
    env.key_filename = result.split()[1].replace('"', '')

    # Directorio del sitio tectareas
    env.site_dir = '/var/www/tectareas'


@task
def bootstrap():
    '''
    A partir de un sistema "vacío", con todas las dependencias instaladas,
    prepara el ambiente para correr la aplicación.
    '''
    require('site_dir')
    # Crea la base de datos
    run('echo "CREATE DATABASE tectareas;"|mysql --batch --user=root --password=password --host=localhost')
    # activar modulo de apache
    run('a2enmod rewrite')
    with cd(env.site_dir):
        # Descarga composer
        run('curl -sS https://getcomposer.org/installer | php')
        # Instala las dependencias de laravel
        run('php composer.phar install')


@task
def resetdb():
    '''
    Elimina la base de datos y la vuelve a crear
    '''
    require('site_dir')
    run('echo "DROP DATABASE IF EXISTS tectareas; CREATE DATABASE tectareas;"|mysql --batch --user=root --password=password --host=localhost')


@task
def test():
    '''
    Ejecuta las pruebas unitarias de la aplicación
    '''
    require('site_dir')
    with cd(env.site_dir):
        run('phpunit')


@task
def createmigration():
    '''
    Crea una migracion a partir de la entrada del usuario
    '''
    require('site_dir')
    with cd(env.site_dir):
        migration = raw_input(u'Nombre de la migracion: ')
        run('php artisan migrate:make %s' % migration)


@task
def executemigration():
    '''
    Ejecuta todas las migraciones pendientes
    '''
    require('site_dir')
    with cd(env.site_dir):
        run('php artisan migrate')


@task
def executeseed():
    '''
    Agrega datos de prueba en la base de datos
    '''
    require('site_dir')
    with cd(env.site_dir):
        run('php artisan db:seed')
