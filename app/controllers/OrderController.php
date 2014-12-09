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

		#print_r($_POST); 
		
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		//'<br><br>';
	
	#Instantiate new Order model class
	$order = new Order();
	#create a variable for the current user;
	$user = Auth::user();
	$order->fill(Input::all());
	
	# CREATE TIME DATE FROM POST ARRAY VARIABLES
	#$date_time_due = $_POST['date_due'].' '.$_POST['time_due'];
	#$date_time_due = new DateTime($date_time_due);
	
	# SET ORDER VARIABLES
	#$order->due = $date_time_due;
	#$order->status = $_POST['status'];
	#$order->comments = $_POST['comments'];
	#$order->user()->associate(Auth::user());

	# SAVE ORDER
	$order->save();
	
	/*Array ( [_token] => LhwAQuRzdBrOeuR46cwIgVvl7yBS11V7MfmfCaeW 
	[1] => 2 [3] => 1 [4] => 3 [5] => 1 [6] => 1 [10] => 2 [11] => 2 
	[date_due] => 12/27/2014 [time_due] => 9:00 
	[comments] => no capers, please! [status] => open ) */
	#$now = date("Y-m-d H:i:s");
	
	#$je_post = json_encode($_POST);
	#$jd_post = json_decode($je_post, true);
	
	#echo $je_post['0']['id'];
	#echo $jd_post['_token'];
	#print_r($jd_post);
	
	#foreach( $jd_post as $key => $val ) {
	#	if ( $key == '1' ) {
	#		
	#		echo "a food item should have been added to food order.";
	#		
	#	}
	}
	
	# EXAMPLE OF HOW TO ATTACH LINE ITEM TO FOOD_ORDER TABLE.
	# NEED FOOD KEY-VAL PAIRS TO BE IN THEIR OWN ARRAY FOR THIS ATTACH STEP
	# HAVING TROUBLE FIGURING OUT HOW TO DO THIS IN THE VIEW.
	//$order->food()->attach(5, array('quantity' => 4, 'created_at' => $now));
	
	/*foreach($_POST as $key => $val){
     print "<tr><td>" . $key . "</td><td>" . $val . "</td></tr>";
	}*/
	
	/*
	foreach( $_POST as $stuff => $val ) {
		if( is_array( $stuff ) ) {
    		foreach( $stuff as $thing) {
        	echo $thing;
    	}
		} else {
    		echo $stuff.' ';
    		echo $val;
    		echo "<br>";
		}
	}*/
	/*foreach( $_POST as $key => $val ) {
		if ( ctype_digit($key) ) {
			echo "a food item should have been added to food order.";
			
		}
	}*/
	
	//dd($_POST);
	/*$max = sizeof($_POST);
	for($i = 0; $i < $max;$i++)
	{
		if (ctype_digit($_POST[$i])) {
			echo "a food item should have been added to food order.";
			$order->food()->attach($_POST, array('quantity' => $_POST[$i], 'created_at' => $now));
		}
			
	} */
	
	/* foreach ($_POST as $key => $val) {
    	if (ctype_digit($key)) {
        	echo "The string $key => $val consists of all digits.\n";
    	} else {
        	echo "The string $key => $val does not consist of all digits.\n";
    	}
	} */
	
	/*foreach ($_POST as $key => $val) {
    	if (ctype_digit($val)) {
    		echo "$key => $val <br>";
    	}
	} */
	
	#return 'A new order has been added! Check your database to see . . .';
		
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


