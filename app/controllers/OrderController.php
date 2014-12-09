<?php

class OrderController extends BaseController {

	/**
	*
	*/
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

        $this->beforeFilter('guest',
        	array(
        		'only' => array('getLogin','getSignup')
        	));

    }
    
    /**
	* Display orders for the currently logged in user
	*
	*/
	public function getOrders() {
		 
		/*$extended_price = array(0); */
		
		if (Auth::check()) {
			$id = Auth::id();
		} 
		else {
			return Redirect::to('/login');
		}
	
		$orders = Order::whereHas('user', function($q) use($id)
		{
			$q->where('id', '=', $id);
	
		})->get();

		return View::make('order_index')
			->with('orders', $orders);
	}
	
	
	/**
	* Show the "Create an Order Form"
	* @return View
	*/
	public function getCreate() {

		if (Auth::check()) {
			$id = Auth::id();
		} 
		else {
			return Redirect::to('/login');
		}
		
		$foods = Food::all();

    	return View::make('order_create')->with('foods', $foods);

	}
	
	/**
	* Show the "Create an Order Form"
	* @return View
	*/
	public function getCreate2() {

		
		
		if (Auth::check()) {
			$id = Auth::id();
		} 
		else {
			return Redirect::to('/login');
		}
		
		$food_options = Food::lists('id', 'name', 'price');
		$foods = Food::all();

    	return View::make('order_create2')
    		->with('foods', $foods)
    		->with('food_options', $food_options);

	}


	/**
	* Process the "Create an order form"
	* @return Redirect
	*/
	public function postCreate() {
	
	 $data = (Input::all());
	
	#Instantiate new Order model class
	$order = new Order();
	#create a variable for the current user;
	$user = Auth::user();
	
	/* Tried this and don't think it works */
	#$order->fill(Input::all());
	
	# CREATE TIME DATE FROM POST ARRAY VARIABLES
	$date_time_due = $data['date_due'].' '.$data['time_due'];
	$date_time_due = new DateTime($date_time_due);
	
	# SET ORDER VARIABLES
	$order->due = $date_time_due;
	$order->status = $data['status'];
	$order->comments = $data['comments'];
	$order->user()->associate(Auth::user());

	# SAVE ORDER
	$order->save();
	$now = date("Y-m-d H:i:s");
	
	#WRITE order LINE ITEMS TO THE food_order TABLE
	#
	# EXAMPLE OF HOW TO ATTACH LINE ITEM TO FOOD_ORDER TABLE.
	# NEED FOOD KEY-VAL PAIRS TO BE IN THEIR OWN ARRAY FOR THIS ATTACH STEP
	# HAVING TROUBLE FIGURING OUT HOW TO DO THIS IN THE VIEW.
	#
	# WHAT I WOULD LIKE IS THE FOLLOWING:
	#
	# IN A FOREACH LOOP THAT USES THE SUBSET OF THE POST ARRAY WITH NUMERIC KEYS
	# WHERE THE ARRAY KEY IS NUMERIC, AND THE VALUE IS > 0, 
	# ASSIGN THE ARRAY KEY TO BE THE food_id IN THE food_order TABLE (5, below).
	# quantity WILL BE THE VALUE FOR THE GIVEN NUMERIC KEY; created_at = now.
	#
	# HERE'S AN EXAMPLE OF WHAT THE POST ARRAY LOOKS LIKE:
	/*Array ( [_token] => LhwAQuRzdBrOeuR46cwIgVvl7yBS11V7MfmfCaeW 
	[1] => 2 [3] => 1 [4] => 3 [5] => 1 [6] => 1 [10] => 2 [11] => 2 
	[date_due] => 12/27/2014 [time_due] => 9:00 
	[comments] => no capers, please! [status] => open ) */
	
	foreach($data as $key => $val) {
	 	if ( is_int($key) && $val > 0 ) {
	 		echo "$key => $val <br>";
	 		$order->food()->attach($key, array('quantity' => $val, 'created_at' => $now));
	 	}
	 }
	
	
	
	return 'A new order has been added! Check your database to see . . .';
	}
	
}

?>


