<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shoes', function($table) {

			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->date('purchase_date');
			$table->decimal('mileage', 5, 1);
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shoes');
	}

}
