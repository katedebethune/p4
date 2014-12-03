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
	return View::make('index');
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

    $orders = Order::with('user')->get();
    //$order_ds = Order::with('food_order')->get();
    
    foreach($orders as $order) {
    	echo $order->user->firstname.' '.$order->user->lastname.' due: '.$order->due.'<br>';
    	//foreach($order->foods as $food) {
    	//	print '<li>' . $food->name . ' ' . $food->quantity;
    	//}
    	foreach($order->food()->select('name', 'quantity')->get() as $food){
    		print '<li>' . $food->name . ' ' . $food->quantity;
		}
    	echo '<br>';
    }
    
    //if($book) {
    //    return $book->title;
    //}
    //else {
    //   return 'Book not found.';
    //}

});

