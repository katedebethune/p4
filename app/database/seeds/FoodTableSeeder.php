<?php

class FoodTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();
		
		$food = Food::create(array(
			'name' => 'Country Chicken Salad',
			'description' => 'Tender morsels of Bell & Evans chicken combined with celery, walnuts, dried cherries, and a light flavorful dressing',
			'sold_by' => 'weight',
			'sold_by_desc' => 'per quart',
			'size' => '',
			'price' => '5.99',
			'menu_code' => 'both'));
			
		$food = Food::create(array(
			'name' => 'Rotisserie Chicken',
			'description' => 'Organic Bell & Evans chickens, brined and marinated with our French country herb mix. Slow roasted to perfection.',
			'sold_by' => 'unit',
			'sold_by_desc' => 'each',
			'size' => '',
			'price' => '8.99',
			'menu_code' => 'cafe'));
			
		$food = Food::create(array(
			'name' => 'Kale Salad',
			'description' => 'Curly Kale with finely shaved Vidalia onion and toasted walnut, dressed in a light citrus vinagrette',
			'sold_by' => 'weight',
			'sold_by_desc' => 'per quart',
			'size' => '',
			'price' => '3.99',
			'menu_code' => 'both'));
		
		 $food = Food::create(array(
		 	'name' => 'Potato Knish',
		 	'description' => 'Garlicky mashed-potatoes in  tender, golden crust.',
		 	'sold_by' => 'unit',
		 	'sold_by_desc' => 'each',
		 	'size' => '',
		 	'price' => '1.25',
		 	'menu_code' => 'both'));
		 
		 $food = Food::create(array(
		 	'name' => 'Grilled Salmon',
		 	'description' => 'Freshly caught Atlantic Salmon delicately grilled with our sesame wasabi marinade',
		 	'sold_by' => 'weight',
		 	'sold_by_desc' => 'per pound',
		 	'size' => '',
		 	'price' => '8.99',
		 	'menu_code' => 'cafe'));
		 	
		 $food = Food::create(array(
		 	'name' => 'Assorted Cookies',
		 	'description' => 'A tempting assortment of homemade chocolate chunk, peanut butter, sugar, and ginger snaps.
		 	One pound serves about 12 people.',
		 	'sold_by' => 'weight',
		 	'sold_by_desc' => 'per pound',
		 	'size' => '',
		 	'price' => '6.99',
		 	'menu_code' => 'both'));
		 
		 $food = Food::create(array(
		  	'name' => 'Tomato Soup',
		  	'description' => 'Fresh tomatoes, cooked down slowly and combined with basil, a hint of garlic and secret herbs',
		  	'sold_by' => 'volume',
		  	'sold_by_desc' => 'per quart',
		  	'size' => '',
		  	'price' => '5.99',
		  	'menu_code' => 'cafe'));
		  	
		  $food = Food::create(array(
		  	'name' => 'Matzoball Soup',
		  	'description' => 'Homeade matzoballs in our delicious chicken soup with carrot, celery, and egg noodles',
		  	'sold_by' => 'volume',
		  	'sold_by_desc' => 'per quart',
		  	'size' => '',
		  	'price' => '6.99',
		  	'menu_code' => 'cafe'));
		  	
		 $food = Food::create(array(
		 	'name' => 'Lentil Soup',
		 	'description' => 'French lentils cooked until just tender with sage, rosemary, and tarragon',
		 	'sold_by' => 'volume',
		 	'sold_by_desc' => 'per quart',
		 	'size' => '',
		 	'price' => '4.99',
		 	'menu_code' => 'cafe'));
		 	
		  $food = Food::create(array(
		 	'name' => 'Sandwich platter',
		 	'description' => 'An assortment of sandwiches on Iggy baguettes or fresh foccacia. Selection includes 
		 	mozzarella panini, roast beef, brie & pear, turkey with havarti, chicken salad, and tuna salad. Minimum order: 10',
		 	'sold_by' => 'unit',
		 	'sold_by_desc' => 'per person',
		 	'size' => '',
		 	'price' => '5.99',
		 	'menu_code' => 'catering'));
		 	
		 $food = Food::create(array(
		 	'name' => 'Bagel Platter',
		 	'description' => 'Sliced fresh bagels from Rosenfeld with all the tempting accompaniments, including sliced nova lox, tomato,
		 	cucumber, red onion, capers, and (as always) a few seasonal surprises! Minimum order: 10',
		 	'sold_by' => 'unit',
		 	'sold_by_desc' => 'per person',
		 	'size' => '',
		 	'price' => '6.99',
		 	'menu_code' => 'catering'));
		 	
		  $food = Food::create(array(
		 	'name' => 'Grilled Salmon Platter',
		 	'description' => 'Our melt-in-your-mouth-tender grilled salmon for your next office luncheon or festive occassion! 
		 	Accompanied by our delicious home-made lemon-dill mayonnaise, lemon wedges, and capers. 
		 	Beautifully presented in ready-to-serve portions. Minimum order: 10.',
		 	'sold_by' => 'unit',
		 	'sold_by_desc' => 'per person',
		 	'size' => '',
		 	'price' => '8.99',
		 	'menu_code' => 'catering'));
	}
	
}

?>

