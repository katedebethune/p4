<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		$cafe_menu = Food::cafeMenu();
  		$catering_menu = Food::cateringMenu();
  		
  		return View::make('index')
			->with('cafe_menu', $cafe_menu)
			->with('catering_menu', $catering_menu);
	}
}


