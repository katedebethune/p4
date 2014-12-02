<?php

class FoodTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();
		
		$food = Food::create(array(
			'name' => 'Country Chicken Salad',
			'description' => 'Tender morsels of Bell & Evans chicken combined with celery, walnuts, dried cherries, and a light flavorful dressing',
			'sold_by' => 'weight',
			'size' => '',
			'price' => '4.99',
			'menu_code' => 'both'));
			
		$food = Food::create(array(
			'name' => 'Rotisserie Chicken',
			'description' => 'Organic Bell & Evans chickens, brined and marinated with our French country herb mix. Slow roasted to perfection.',
			'sold_by' => 'unit',
			'size' => '',
			'price' => '7.99',
			'menu_code' => 'cafe'));
			
		$food = Food::create(array(
			'name' => 'Kale Salad',
			'description' => 'Curly Kale with finely shaved Vidalia onion and toasted walnut, dressed in a light citrus vinagrette',
			'sold_by' => 'weight',
			'size' => '',
			'price' => '3.99',
			'menu_code' => 'both'));
		
		 $food = Food::create(array(
		 	'name' => 'Potato Knish',
		 	'description' => 'Garlicky mashed-potatoes in  tender, golden crust.',
		 	'sold_by' => 'unit',
		 	'size' => '',
		 	'price' => '1.25',
		 	'menu_code' => 'both'));
		 
		 $food = Food::create(array(
		 	'name' => 'Grilled Salmon',
		 	'description' => 'Freshly caught Atlantic Salmon delicately grilled with our sesame wasabi marinade',
		 	'sold_by' => 'weight',
		 	'size' => '',
		 	'price' => '8.99',
		 	'menu_code' => 'both'));
		 	
		 $food = Food::create(array(
		 	'name' => 'Assorted Cookies',
		 	'description' => 'Homemade chocolate chunk, peanut butter, sugar, and ginger snaps',
		 	'sold_by' => 'weight',
		 	'size' => '',
		 	'price' => '6.99',
		 	'menu_code' => 'both'));
		 
		 $food = Food::create(array(
		  	'name' => 'Tomato Soup',
		  	'description' => 'Fresh tomatoes, cooked down slowly and combined with basil, a hint of garlic and secret herbs',
		  	'sold_by' => 'volume',
		  	'size' => '',
		  	'price' => '0.19',
		  	'menu_code' => 'cafe'));
		  	
		  $food = Food::create(array(
		  	'name' => 'Matzoball Soup',
		  	'description' => 'Homeade matzoballs in our delicious chicken soup with carrot, celery, and egg noodles',
		  	'sold_by' => 'volume',
		  	'size' => '',
		  	'price' => '0.39',
		  	'menu_code' => 'cafe'));
		  	
		 $food = Food::create(array(
		 	'name' => 'Lentil Soup',
		 	'description' => 'French lentils cooked until just tender with sage, rosemary, and tarragon',
		 	'sold_by' => 'volume',
		 	'size' => '',
		 	'price' => '0.19',
		 	'menu_code' => 'cafe'));
		 	
		  $food = Food::create(array(
		 	'name' => 'Sandwich platter',
		 	'description' => 'Assorted sandwiches on Iggy baguettes',
		 	'sold_by' => 'unit',
		 	'size' => '',
		 	'price' => '5.99',
		 	'menu_code' => 'catering'));
		 	
		 $food = Food::create(array(
		 	'name' => 'Bagel Platter',
		 	'description' => 'Sliced fresh bagels from Rosenfeld with all the tempting accompinments and a few surprises!',
		 	'sold_by' => 'unit',
		 	'size' => '',
		 	'price' => '6.99',
		 	'menu_code' => 'catering'));
	}
	
}

?>

