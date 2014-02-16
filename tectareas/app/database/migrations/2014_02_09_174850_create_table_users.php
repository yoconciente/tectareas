<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {

	public function up()
	{
		Schema::create('profession', function($table){
			$table->increments('id');
			$table->string('name', 75);
			$table->string('details', 100);
		});
		$professions = array(
			'Ingeniería en Sistemas Computacionales',
			'Ingeniería en Informática',
			'Ingeniería en Software',
			'Ingeniería en Tecnologías de Información o Comunicaciones',
			'Ingeniería en Tecnologías de la Información',
			'Otra'
		);
		foreach($professions as $profession) {
			DB::table('profession')->insert(
				array('name' => $profession)
			);
		}

		Schema::create('user', function($table) {
			$table->increments('id');
			$table->string('name', 75);
			$table->string('email', 75);
			$table->string('password', 64);
			$table->enum('confirmed', array('yes', 'no'))->default('no');
			$table->string('confirmation_code', 64);
			$table->string('university', 75);
			$table->integer('profession_id')->unsigned();
			$table->string('github_user', 50);
			$table->string('bitbucket_user', 50);
			$table->enum('agree', array('yes', 'no'))->default('no');
			$table->foreign('profession_id')
				->references('id')
				->on('profession');
			$table->timestamps();
		});
	}


	public function down()
	{
		Schema::drop('user');
		Schema::drop('profession');
	}

}
