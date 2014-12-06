<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRunsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('runs', function($table) {

			$table->increments('id');
			$table->timestamps();
			$table->date('date');
			$table->text('notes')->nullable();
			$table->decimal('mileage', 4, 1);
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('shoe_id')->unsigned();
			$table->foreign('shoe_id')->references('id')->on('shoes');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('runs');
	}

}
