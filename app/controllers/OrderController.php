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

    	return View::make('order_create')->with('foods',$foods);

	}


	/**
	* Process the "Add a book form"
	* @return Redirect
	*/
	public function postCreate() {

		# Instantiate the book model
		$book = new Book();

		$book->fill(Input::all());
		$book->save();

		# Magic: Eloquent
		$book->save();

		return Redirect::action('BookController@getIndex')->with('flash_message','Your book has been added.');

	}

	
	
	
	
	
	 /**
	* SQL tests for /order page
	*
	*/
	public function getOrdersSQL() {
		 
		if (Auth::check()) {
			$id = Auth::id();
		} 
		else {
			return Redirect::to('/login');
		}
	
		/*$orders = Order::whereHas('user', function($q) use($id)
		{
			$q->where('id', '=', $id);
	
		})->get(); */
		
		$user = DB::select('select u.id, u.firstname, u.lastname
		from users u
		where u.id = ?', array($id));
		
		
		$orders = DB::select('select  
		o.id, o.due, o.comments, 
		f.name, f.description, f.price,
		fo.quantity 
		from users u, orders o, foods f, food_order fo
		where u.id = o.user_id
		and o.id = fo.order_id
		and f.id = fo.food_id
		and u.id = ?', array($id)); 
		

/*DB::select(DB::raw("CREATE TEMPORARY TABLE order_d
										id INT NOT NULL
                                       ,name VARCHAR(255) NOT NULL
                                       ,type VARCHAR(255) NOT NULL
                                       ,brands_list VARCHAR(255) NOT NULL
                                       ,created_at VARCHAR(255) NOT NULL
                                       );"
                    )); */

/*DB::select(DB::raw("
    CREATE TEMPORARY TABLE order_d (
    	select distinct id, due from orders o where exists (
    		select * from users u where u.id = o.user_id and u.id = 1
    		)
    	);"
    )); */
    
/*DB::select(DB::raw("SELECT * FROM order_d;")); */

    /*
     CREATE TEMPORARY TABLE food_d
    (select od.id, f.name, f.price, f.sold_by, fo.quantity, f.price*fo.quantity as ext_price 
    from order_d od, foods f, food_order fo 
    where f.id = fo.food_id and od.id = fo.order_id);*/
    


#$test = DB::select(DB::raw("select * from users;"));
#dd($test);
#$order_d_test = DB::select(DB::raw("select * from order_d;"));
#dd($order_d_test);

		
		
		#print_r($orders);
		
		dd($orders);
		#dd($user);
		 #$data -> {'screenshots'}[0] -> {'original'} 
		 #echo $orders->{'id'[0]};
		
		#return $orders->results_array();
		#echo $orders->results_array();
		/*
		$je_user = json_encode($user);
		$jd_user = json_decode($je_user, true);
		
		$je_orders = json_encode($orders);
		#echo $je_orders['0']['id'];
		$jd_orders = json_decode($je_orders, true);
		$max = sizeof($jd_orders);
		#for($i = 0; $i < $max; $i++) {
		#	echo $jd_orders[$i]["name"];
		#}
		echo 'Orders for ' . $jd_user[0]["firstname"] . ' ' . $jd_user[0]["lastname"];
		foreach($jd_orders as $o) {
			echo $o["name"];
			echo '<br>';
		}
		*/
		#	echo $jd_orders;
		#echo $jd_orders->id;
		#echo $orders['0']['id'];
	
		/*foreach($orders as $order) {
			echo $order->user->id.' '.$order->user->firstname.' '.$order->user->lastname.' due: '.$order->due.'<br>';
			foreach($order->food()->select('name', 'quantity', 'price')->get() as $food){
				print '<li>' . $food->name . ' ' . $food->quantity . ' ' . $food->price;
			}
			echo '<br>';
		} */
	}
}

?>


