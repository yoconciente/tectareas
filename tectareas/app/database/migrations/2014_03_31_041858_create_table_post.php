<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePost extends Migration {

	public function up()
	{
		Schema::create('category', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 65);
			$table->string('slug', 50);
			$table->string('description', 150);
		});

		DB::table('category')->insert(
			array('name' => 'default', 'slug' => 'default')
		);

		Schema::create('post', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 100);
			$table->string('extract', 250);
			$table->integer('score')->unsigned();
			$table->text('body');
			$table->tinyInteger('published');
			$table->string('slug', 50);
			$table->string('seo_words', 100);
			$table->integer('category_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('category');
			$table->foreign('user_id')->references('id')->on('user');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('post');
		Schema::drop('category');
	}

}
