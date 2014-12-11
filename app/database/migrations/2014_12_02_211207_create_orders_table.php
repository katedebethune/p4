<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->dateTime('due');
			$table->string('status');
			$table->text('comments');
			$table->float('order_total');
			$table->timestamps();
			
			#define fk
			#$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::drop('orders');
	}

}
