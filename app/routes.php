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
	return View::make('hello');
});

Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});

Route::get('mysql-test', function() {
	
		#Print environment
		echo 'Environment: '.App::environment().'<br>';
		
		# Use the DB component to show the databases
		$results = DB::select('SHOW DATABASES;');
		
		# If the "Pre" package is not installed, use print_r instead
		echo Pre::render($results);
});
