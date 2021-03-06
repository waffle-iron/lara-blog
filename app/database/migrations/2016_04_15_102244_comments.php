<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table) {
			$table->increments('id');
			$table ->integer('post_id') -> unsigned() -> default(0);
			$table->foreign('post_id')
			  ->references('id')->on('posts')
			  ->onDelete('cascade');
			$table ->integer('user_id') -> unsigned() -> default(0);
			$table->foreign('user_id')
			  ->references('id')->on('users')
			  ->onDelete('cascade');
			$table->text('body');
			$table->boolean('is_active')->default(1);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
