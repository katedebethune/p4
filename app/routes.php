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
	
  $foods = food::all();
  #return View::make('index', array('foods'=>$foods));
  return View::make('index')
  		->with('foods', $foods);
  #return View::make('index');
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
* Debug
* (Implicit Routing)
*/
Route::controller('debug', 'DebugController');

Route::get('/practice-reading-orders', function() {

    #$orders = Order::with(array('user' => function($query)
    #{
    #	$query->where('order.user_id', '=', '1');
    #}))->get();
    
    if (Auth::check()) {
     	$id = Auth::id();
	} 
	else {
		$id = '3';
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

