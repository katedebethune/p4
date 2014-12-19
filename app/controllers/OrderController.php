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
		
		$date = strtotime("+2 day", time());
		//echo date('Y-m-d H:i:s', $date);

		if (Auth::check()) {
			$id = Auth::id();
		} 
		else {
			return Redirect::to('/login');
		}
		
		/*$orders = Order::whereHas('user', function($q) use($id)
		{
			$q->where('id', '=', $id);
	
		})->orderBy('due', 'ASC')->get();*/
		
		$orders = Order::whereHas('user', function($q) use($id)
		{
			$q->where('id', '=', $id);
	
		});
		
		$orders = $orders->where('due', '>', date('Y-m-d H:i:s', $date))
		->orderBy('due', 'ASC')
		->get();
		
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
		
		$foods = Food::cateringMenu();

    	return View::make('order_create')->with('foods', $foods);
	}
	
	/**
	* Process the "Create an order form"
	* @return Redirect
	*/
	public function postCreate() {
	
		// get the POST data
		$data = (Input::all());
		$count = 0;
		/**
		 * TO DO next: 
		 * 1) move logic to model
		 * 2) redo unit - done 
		 * 3) add calculated fields to db - done
		 * 4) form validation - done, but brittle
		 */
		
		// create a new model instance for validation
		$order = new Order();
		// attempt validation
		if (!$order->validate($data))
		{
    		return Redirect::to('/orders/create/')
				->with('flash_message', 'Order creation failed, please correct errors below')
				->withInput()
				->withErrors($order->errors());
		}
		
		# INSTANTIATE NEW Order MODEL CLASS
		$id = $order->id;
		# CREATE AN INSTANCE FOR THE CURRENT USER
		$user = Auth::user();
	
		# CREATE TIME DATE FROM POST ARRAY VARIABLES
		$date_time_due = $data['date_due'].' '.$data['time_due'];
		$date_time_due = new DateTime($date_time_due);
	
		# SET ORDER VARIABLES
		$order->due = $date_time_due;
		$order->status = $data['status'];
		$order->comments = $data['comments'];
		# ASSOCIATE THE USER WITH THIS ORDER
		$order->user()->associate(Auth::user());
		
		# SAVE ORDER
		$order->save();
	
		# ADD ORDER LINE ITEMS TO food_order
		$now = date("Y-m-d H:i:s");
		$order_total = 0.00;
		foreach($data as $key => $val) {
			if ( is_int($key) && $val > 0 ) {
				$ext_price = $val * Food::find($key)->price;
				$order->food()->attach($key, array('quantity' => $val, 'extended_price' => $ext_price, 'created_at' => $now));
				$count++;
				$order_total = $order_total + $ext_price;
			}
		 }
		
		if ( $count > 0 ) {
			$order->order_total = $order_total;
			$order->save();
			return Redirect::action('OrderController@getOrders')->with('flash_message','Your order has been added.');
		}
		else {
			return Redirect::action('OrderController@getEdit', array('id' => $order->id))
			->with('flash_message', 'Please select at least one item for your order.');
		}
	}
	
	/**
	* Show the "Edit an order form"
	* @return View
	* $id will be a hidden field with the order id, coming from the order/index view
	*/
	 public function getEdit($id) {

		try {
		    $order = Order::findOrFail($id);
		    $foods = Food::cateringMenu();
		    $order_detail = $order->food()->select('food_id', 'quantity')->get();
		    $flag = 0;
		    $dt = new DateTime($order->due);
		}
		catch(exception $e) {
		    return Redirect::to('/orders')->with('flash_message', 'Order not found');
		}
    	   return View::make('order_edit')
    		->with('order', $order)
    		->with('foods', $foods)
    		->with('order_detail', $order_detail)
    		->with('flag', $flag)
    		->with('dt', $dt); 
	} 
	
	/**
	* Process the input from the getEdit form
	* @return Redirect
	*/
	
	public function postEdit() {
		
		// get the POST data
		$data = Input::all();
		// create a new model instance for validation
		$val_test = new Order();
		// attempt validation
		if (!$val_test->validate($data))
		{
    		return Redirect::to('/orders/edit/'.Input::get('id'))
				->with('flash_message', 'Order Editing failed; please fix the errors listed below.')
				->withInput()
				->withErrors($val_test->errors());
		}
		
		try {
	        $order = Order::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/orders')->with('flash_message', 'Order not found');
	    }
	    
	    $count = 0;
	    
		# CREATE TIME DATE FROM POST ARRAY VARIABLES
		$date_time_due = $data['date_due'].' '.$data['time_due'];
		$date_time_due = new DateTime($date_time_due);
	
		# UPDATE ORDER VARIABLES
		$order->due = $date_time_due;
		$order->status = $data['status'];
		$order->comments = $data['comments'];
		
		# SAVE ORDER
		$order->save();
		
		#DELETE ASSOCIATED ROWS IN food_order
		$order->food()->detach();
	
		# ADD UPDATED ORDER LINE ITEMS TO food_order
		$now = date("Y-m-d H:i:s");
		$order_total = 0.00;
		foreach($data as $key => $val) {
			if ( is_int($key) && $val > 0 ) {
				$ext_price = $val * Food::find($key)->price;
				$order->food()->attach($key, array('quantity' => $val, 'extended_price' => $ext_price, 'created_at' => $now));
				$count++;
				$order_total = $order_total + $ext_price;
			}
		 } 
	   if ( $count > 0 ) {
			$order->order_total = $order_total;
			$order->save();
			return Redirect::action('OrderController@getOrders')->with('flash_message','Your order has been updated.');
		}
		else {
			return Redirect::action('OrderController@getEdit', array('id' => $order->id))
			->with('flash_message', 'Please select at least one item for your order.');
		} 
	} 
	
	/**
	* Process order deletion
	*
	* @return Redirect
	*/
	public function postDelete() {

		try {
	        $order = Order::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/orders/')->with('flash_message', 'Could not delete order - not found.');
	    }

	    Order::destroy(Input::get('id'));

	    return Redirect::to('/orders/')->with('flash_message', 'Order deleted.');

	}
	
}

?>




