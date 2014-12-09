<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	
  $cafe_menu = Food::cafeMenu();
  $catering_menu = Food::cateringMenu();
  return View::make('index')
  		->with('cafe_menu', $cafe_menu)
  		->with('catering_menu', $catering_menu);
});

/**
* User
* (Explicit Routing)
*/
Route::get('/signup','UserController@getSignup' );
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', 'UserController@postSignup' );
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );

/**
* Orders
* TRYING TO DECIDE BETWEEN IMPLICIT AND EXPLICIT CONTROLLER
* Think explicit is the way to go; implicit was adding extra file to URL
*/
#Route::controller('orders', 'OrderController');
Route::get('/orders','OrderController@getOrders' );
Route::get('/ordersSQL','OrderController@getOrdersSQL' );
Route::get('/orders/create', 'OrderController@getCreate');
Route::post('/orders/create', 'OrderController@postCreate');
Route::get('/orders/edit/{id}', 'OrderController@getEdit');
Route::post('/orders/edit', 'OrderController@postEdit');
Route::post('/orders/delete', 'OrderController@postDelete');

/**
* Debug
* (Implicit Routing)
*/
Route::controller('debug', 'DebugController');

/**
 *
 * NON -CONTROLLER TEST ROUTES
 */

Route::get('/practice-reading-orders', function() {

    #$orders = Order::with(array('user' => function($query)
    #{
    #	$query->where('order.user_id', '=', '1');
    #}))->get();
    
    if (Auth::check()) {
     	$id = Auth::id();
	} 
	else {
		#$id = '3';
		return Redirect::to('/login');
	}
    
   
    echo $id;
    echo '<br>';
    echo '<br>';
    
    $orders = Order::whereHas('user', function($q) use($id)
	{
    	$q->where('id', '=', $id);
	
	})->get();
	
	
	#$orders = Order::find(1);
	
	#echo $orders->user()->first()->email;
	#echo '<br>';
	#echo $orders->user->email;
    
    #echo Paste\Pre::render($orders,'Order_data');
    
    #$orders = User::find(2)->order()->where('user_id', '=', '2')->get();
    #$orders = User::find(2)->order()->get();
    
    #return View::make('order_index')
    #	->with('orders', $orders);
    
    /*
    return View::make('book_index')
				->with('books', $books)
				->with('query', $query); */
    #$orders = Order::with('user')->get();
    
    
    foreach($orders as $order) {
    	echo $order->user->id.' '.$order->user->firstname.' '.$order->user->lastname.' due: '.$order->due.'<br>';
    	foreach($order->food()->select('name', 'quantity', 'price')->get() as $food){
    		print '<li>' . $food->name . ' ' . $food->quantity . ' ' . $food->price;
		}
    	echo '<br>';
    }

});

Route::get('/practice-creating-order', function() {

	
	$user = new User;
	$user->firstname = 'John';
	$user->lastname = 'smith';
	$user->email = 'panda@blag.com';
	$user->password = Hash::make('blah');
	$user->pwd_unhashed = 'blah';
	#$user->password = 'blah';
	$remember_token = 'YES';
	$user->save(); 
	
	#Instantiate new Order model class
	$order = new Order();

	# Set
	$order->due = '2014-12-24 10:00:00';
	$order->status = 'open';
	$order->comments = 'lorem ipsum dolor amit';
	//$order->user_id = 2;
	$order->user()->associate($user); #associate a user with this order

	$order->save();
	
	$now = date("Y-m-d H:i:s");
	$order->food()->attach(5, array('quantity' => 4, 'created_at' => $now));
	$order->food()->attach(7, array('quantity' => 1, 'created_at' => $now));
	$order->food()->attach(9, array('quantity' => 1, 'created_at' => $now));
	$order->food()->attach(3, array('quantity' => 3, 'created_at' => $now));
	$order->food()->attach(10, array('quantity' => 8, 'created_at' => $now));
	$order->food()->attach(6, array('quantity' => 12, 'created_at' => $now));
	
	return 'A new order has been added! Check your database to see . . .';
});


