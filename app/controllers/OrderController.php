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
		
		//$foods = Food::all();
		$foods = Food::cateringMenu();

    	return View::make('order_create')->with('foods', $foods);

	}
	
	/**
	* Process the "Create an order form"
	* @return Redirect
	*/
	public function postCreate() {
	
		$data = (Input::all());
	
		/**
		 * TO DO next: 
		 * 1) move logic to model
		 * 2) redo unit
		 * 3) add calculated fields to db
		 * 4) form validation
		 * 5) wrap this in a transaction
		 */
		
		# INSTANTIATE NEW Order MODEL CLASS
		$order = new Order();
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
		foreach($data as $key => $val) {
			if ( is_int($key) && $val > 0 ) {
				echo "$key => $val <br>";
				$order->food()->attach($key, array('quantity' => $val, 'created_at' => $now));
			}
		 }
		//return 'A new order has been added! Check your database to see . . .';
		return Redirect::action('OrderController@getOrders')->with('flash_message','Your order has been added.');
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
		    //create a variable of key -> quantity pairs.
		    //pass this to view and use this to fill select boxes on form
		}
		catch(exception $e) {
		    return Redirect::to('/orders')->with('flash_message', 'Order not found');
		}

    	return View::make('order_edit')
    		->with('order', $order)
    		->with('foods', $foods);

	} 
	
	/**
	* Process the "Edit a book form"
	* @return Redirect
	*/
	/*
	public function postEdit() {

		try {
	        $book = Book::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/book')->with('flash_message', 'Book not found');
	    }

	    # http://laravel.com/docs/4.2/eloquent#mass-assignment
	    $book->fill(Input::all());
	    $book->save();

	   	return Redirect::action('BookController@getIndex')->with('flash_message','Your changes have been saved.');

	} */

	
	/**
	* Process order deletion -ORIG
	*
	* @return Redirect
	*/
	/*
	public function postDelete() {

		try {
	        $book = Book::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/book/')->with('flash_message', 'Could not delete book - not found.');
	    }

	    Book::destroy(Input::get('id'));

	    return Redirect::to('/book/')->with('flash_message', 'Book deleted.');

	}*/
	
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
	        return Redirect::to('/orders/')->with('flash_message', 'Could not delete book - not found.');
	    }

	    Order::destroy(Input::get('id'));

	    return Redirect::to('/orders/')->with('flash_message', 'Order deleted.');

	}
	
}

?>


