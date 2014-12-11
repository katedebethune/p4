<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('food_order', function($table)
		{
			#define fields
			#$table->increments('id')->unsigned();
			$table->integer('food_id')->unsigned();
			$table->integer('order_id')->unsigned();
			$table->integer('quantity')->unsigned();
			$table->float('extended_price');
			$table->timestamps();
			
			#associate FKs
			$table->foreign('food_id')->references('id')->on('foods');
			$table->foreign('order_id')->references('id')->on('orders');
			
			#make calculated fields
			#$table->float('ext_price')->('food'->'price' * 'quantity');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('food_order');
	}

}
