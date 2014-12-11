<?php

/**
 * MUST BE RUN AFTER USERS HAVE BEEN SEEDED
 */
class OrderTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();
		
		$faker = Faker::create();
		
		$max = DB::table('users')->max('id');
		$min = DB::table('users')->min('id');
		
		$food_min_id = DB::table('foods')->min('id');
		$food_max_id = DB::table('foods')->max('id');
		
		
    	
    	
		
		
		$now = date("Y-m-d H:i:s");
		
		for ($i = 0; $i < 40; $i++)
		{
			$order = Order::create(array(
			'user_id'=>$faker->numberBetween($min, $max),
			'due'=>$faker->dateTimeBetween($startDate = 'now', $endDate = '+1 month'),
			'status'=>'open',
			'comments' => $faker->realText($maxNbChars = 60, $indexSize = 2)
			));
			$order->save();
			
			# POPULATE food_order PIVOT TABLE with a random # of unique food ids.
			#$rand = $faker->numberBetween(1, 10);
			#for ($j = 0; $j < $rand; $j++)
			$selected = array(0);
			for ($k = 0; $k < $food_max_id; $k++) {
    				array_push($selected, 0);
    		}
			$order_total = 0.00;
			for ($j = 0; $j < 5; $j++)
			{
				$rand_fd_id = $faker->numberBetween($food_min_id, $food_max_id);
				$rand_qt = $faker->numberBetween(1, 10);
				$ext_price = $rand_qt * Food::find($rand_fd_id)->price;
				
    			if ($selected[$rand_fd_id] == 1) {
    				#$rand_fd_id = $faker->numberBetween($food_min_id, $food_max_id)
    				continue;
    			} 
    			else {
					
					$order->food()->attach($rand_fd_id, array('quantity' => $rand_qt, 'extended_price' => $ext_price, 'created_at' => $now));
					$selected[$rand_fd_id] = 1;
					$rand_fd_id = $faker->numberBetween($food_min_id, $food_max_id);
					$order_total = $order_total + $ext_price;
				}
			}
			$order->order_total = $order_total;
			$order->save();
		}
	}
}
?>